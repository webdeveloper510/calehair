<?php
class Mollie_WC_Gateway_Ideal extends Mollie_WC_Gateway_Abstract
{
    /**
     *
     */
    public function __construct ()
    {
        $this->supports = array(
            'products',
            'refunds',
        );

        /* Has issuers dropdown */
        $this->has_fields = TRUE;

        parent::__construct();
    }

    /**
     * @return string
     */
    public function getMollieMethodId ()
    {
        return Mollie_API_Object_Method::IDEAL;
    }

    /**
     * @return string
     */
    public function getDefaultTitle ()
    {
        return __('iDEAL', 'mollie-payments-for-woocommerce');
    }

    /**
     * @return string
     */
    protected function getDefaultDescription ()
    {
        /* translators: Default iDEAL description, displayed above issuer drop down */
        return __('Select your bank', 'mollie-payments-for-woocommerce');
    }

    /**
     * Display fields below payment method in checkout
     */
    public function payment_fields()
    {
        // Display description above issuers
        parent::payment_fields();

        $test_mode = Mollie_WC_Plugin::getSettingsHelper()->isTestModeEnabled();

        $ideal_issuers = Mollie_WC_Plugin::getDataHelper()->getIssuers(
            $test_mode,
            $this->getMollieMethodId()
        );

        $selected_issuer = $this->getSelectedIssuer();

        $html  = '<select name="' . Mollie_WC_Plugin::PLUGIN_ID . '_issuer_' . $this->id . '">';
        $html .= '<option value=""></option>';
        foreach ($ideal_issuers as $issuer)
        {
            $html .= '<option value="' . esc_attr($issuer->id) . '"' . ($selected_issuer == $issuer->id ? ' selected=""' : '') . '>' . esc_html($issuer->name) . '</option>';
        }
        $html .= '</select>';

        echo wpautop(wptexturize($html));
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
        if ($payment->isPaid() && $payment->details)
        {
            return sprintf(
                /* translators: Placeholder 1: consumer name, placeholder 2: consumer IBAN, placeholder 3: consumer BIC */
                __('Payment completed by <strong>%s</strong> (IBAN: %s, BIC: %s)', 'mollie-payments-for-woocommerce'),
                $payment->details->consumerName,
                implode(' ', str_split($payment->details->consumerAccount, 4)),
                $payment->details->consumerBic
            );
        }

        return parent::getInstructions($order, $payment, $admin_instructions, $plain_text);
    }
}
