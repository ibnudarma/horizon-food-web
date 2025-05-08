<?php
class Account_model extends CI_Model {

    public function sign_in($email, $password) {
        $account = $this->db->get_where('account', ['email' => $email])->row();
    
        if ($account && password_verify($password, $account->password)) {
            $result = [
                'id_account' => $account->id_account,
                'email'      => $account->email,
                'role'       => $account->role
            ];
    
            if ($account->role === 'seller') {
                $seller = $this->db->get_where('seller', ['account_id' => $account->id_account])->row();
                $result['id_seller'] = $seller ? $seller->id_seller : null;
            }
    
            if ($account->role === 'customer') {
                $customer = $this->db->get_where('customer', ['account_id' => $account->id_account])->row();
                $result['id_customer'] = $customer ? $customer->id_customer : null;
            }
    
            return (object) $result;
        }
    
        return false;
    }
    
}
