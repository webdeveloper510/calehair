<?php
class Mollie_WC_Gateway_BankTransfer extends Mollie_WC_Gateway_Abstract
{
    const EXPIRY_DEFAULT_DAYS = 12;
    const EXPIRY_MIN_DAYS     = 5;
    const EXPIRY_MAX_DAYS     = 60;

    /**
     *
     */
    public function __construct ()
    {
        $this->supports = array(
            'products',
            'refunds',
        );

        parent::__construct();

        add_filter('woocommerce_' . $this->id . '_args', array($this, 'addPaymentArguments'), 10, 2);
    }

    /**
     * Initialise Gateway Settings Form Fields
     */
    public function init_form_fields()
    {
        parent::init_form_fields();

        $this->form_fields = array_merge($this->form_fields, array(
            'expiry_days' => array(
                'title'             => __('Expiry date', 'mollie-payments-for-woocommerce'),
                'type'              => 'number',
                'description'       => sprintf(__('Number of days after the payment will expire. Default <code>%d</code> days', 'mollie-payments-for-woocommerce'), self::EXPIRY_DEFAULT_DAYS),
                'default'           => self::EXPIRY_DEFAULT_DAYS,
                'custom_attributes' => array(
                    'min'  => self::EXPIRY_MIN_DAYS,
                    'max'  => self::EXPIRY_MAX_DAYS,
                    'step' => 1,
                ),
            ),
            'mail_payment_instructions' => array(
                'title'             => __('Mail payment instructions', 'mollie-payments-for-woocommerce'),
                /* translators: Placeholder 1: enabled or disabled */
                'label'             => sprintf(__('Should Mollie automatically mail the payment instructions to the customer? Default <code>%s</code>', 'mollie-payments-for-woocommerce'), strtolower(__('Disabled', 'mollie-payments-for-woocommerce'))),
                'type'              => 'checkbox',
                'default'           => 'no',
                'description'       => __('If you disable this option the customer still has an option to send the payment instructions to an email address on the Mollie payment screen.', 'mollie-payments-for-woocommerce'),
                'desc_tip'          => true,
            ),
        ));
    }

    /**
     * @param array    $args
     * @param WC_Order $order
     * @return array
     */
    public function addPaymentArguments (array $args, WC_Order $order)
    {
        // Expiry date
        $expiry_days = (int) $this->get_option('expiry_days', self::EXPIRY_DEFAULT_DAYS);

        if ($expiry_days >= self::EXPIRY_MIN_DAYS && $expiry_days <= self::EXPIRY_MAX_DAYS)
        {
            $expiry_date = date("Y-m-d", strtotime("+$expiry_days days"));

            $args['dueDate'] = $expiry_date;
        }

        // Mail payment instructions
        if ($this->get_option('mail_payment_instructions') === 'yes' && !empty($order->billing_email))
        {
            $args['billingEmail'] = trim($order->billing_email);
        }

        return $args;
    }

    /**
     * @return string
     */
    public function getMollieMethodId ()
    {
        return Mollie_API_Object_Method::BANKTRANSFER;
    }

    /**
     * @return string
     */
    public function getDefaultTitle ()
    {
        return __('Bank Transfer', 'mollie-payments-for-woocommerce');
    }

    /**
     * @return string
     */
    protected function getDefaultDescription ()
    {
        return '';
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    protected function paymentConfirmationAfterCoupleOfDays ()
    {
        return true;
    }

    /**
     * @param WC_Order                  $order
     * @param Mollie_API_Object_Payment $payment
     * @param bool                      $admin_instructions
     * @param bool                      $plain_text
     * @return string|null
     */
    protected function getInstructions (WC_Order $order, Mollie_API_Object_Payment $payment, $admin_instructions, $plain_text)
    {
        $instructions = '';

        if (!$payment->details)
        {
            return null;
        }

        $data_helper = Mollie_WC_Plugin::getDataHelper();

        if ($payment->isPaid())
        {
            $instructions .= sprintf(
                /* translators: Placeholder 1: consumer name, placeholder 2: consumer IBAN, placeholder 3: consumer BIC */
                __('Payment completed by <strong>%s</strong> (IBAN: %s, BIC: %s)', 'mollie-payments-for-woocommerce'),
                $payment->details->consumerName,
                implode(' ', str_split($payment->details->consumerAccount, 4)),
                $payment->details->consumerBic
            );
        }
        elseif ($data_helper->hasOrderStatus($order, 'on-hold'))
        {
            if (!$admin_instructions)
            {
                $instructions .= __('Please complete your payment by transferring the total amount to the following bank account:', 'mollie-payments-for-woocommerce') . "\n\n\n";
            }

            /* translators: Placeholder 1: 'Stichting Mollie Payments' */
            $instructions .= sprintf(__('Beneficiary: %s', 'mollie-payments-for-woocommerce'), $payment->details->bankName) . "\n";
            $instructions .= sprintf(__('IBAN: <strong>%s</strong>', 'mollie-payments-for-woocommerce'), implode(' ', str_split($payment->details->bankAccount, 4))) . "\n";
            $instructions .= sprintf(__('BIC: %s', 'mollie-payments-for-woocommerce'), $payment->details->bankBic) . "\n";

            if ($admin_instructions)
            {
                /* translators: Placeholder 1: Payment reference e.g. RF49-0000-4716-6216 (SEPA) or +++513/7587/59959+++ (Belgium) */
                $instructions .= sprintf(__('Payment reference: %s', 'mollie-payments-for-woocommerce'), $payment->details->transferReference) . "\n";
            }
            else
            {
                /* translators: Placeholder 1: Payment reference e.g. RF49-0000-4716-6216 (SEPA) or +++513/7587/59959+++ (Belgium) */
                $instructions .= sprintf(__('Please provide the payment reference <strong>%s</strong>', 'mollie-payments-for-woocommerce'), $payment->details->transferReference) . "\n";
            }

            if (!empty($payment->expiryPeriod)
                && class_exists('DateTime')
                && class_exists('DateInterval'))
            {
                $expiry_date = DateTime::createFromFormat('U', time());
                $expiry_date->add(new DateInterval($payment->expiryPeriod));

                if ($admin_instructions)
                {
                    $instructions .= "\n" . sprintf(
                        __('The payment will expire on <strong>%s</strong>.', 'mollie-payments-for-woocommerce'),
                        $expiry_date->format(wc_date_format())
                    ) . "\n";
                }
                else
                {
                    $instructions .= "\n" . sprintf(
                        __('The payment will expire on <strong>%s</strong>. Please make sure you transfer the total amount before this date.', 'mollie-payments-for-woocommerce'),
                        $expiry_date->format(wc_date_format())
                    ) . "\n";
                }
            }
        }

        return $instructions;
    }
}
