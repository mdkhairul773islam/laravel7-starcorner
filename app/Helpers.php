<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('uploadFile')) {
    function uploadFile($photo = '', $path = '')
    {
        if (!empty($photo) && !empty($path)) {

            $extension = $photo->getClientOriginalExtension();

            $filename  = strSlug(pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME)) .'-'. time() . '.' . $extension;

            if (!is_dir($path)) mkdir($path, 0700, true);

            $photo->move($path, $filename);

            return $path.'/'.$filename;
        }
        return '';
    }
}

if (!function_exists('strSlug')) {
    function strSlug($text = '')
    {
        if (!empty($text)) {

            if (mb_detect_encoding($text) == 'UTF-8') {
                $text = str_replace(' ', '-', trim($text));

            } else {
                $text = str_replace(' ', '-', strtolower(trim($text)));
            }
        }
        return $text;
    }
}

if (!function_exists('strFilter')) {
    function strFilter($text = '')
    {
        if (!empty($text)) {

            $text = str_replace('_', ' ', $text);

            if (mb_detect_encoding($text) == 'UTF-8') {
                $text = $text;
            } else {
                $text = ucwords($text);
            }
        }
        return $text;
    }
}

if (!function_exists('numFilter')) {
    function numFilter($number = '', $digit = 2)
    {
        if (!empty($number)) {

            $number = trim($number);

            if (mb_detect_encoding($number) == 'UTF-8') {
                $number = $number;
            } else {
                $number = number_format($number, $digit);
            }
        }
        return $number;
    }
}

if (!function_exists('partyBalance')) {
    function partyBalance($party_id, $tran_id = null)
    {
        $data = [
            'id'              => '',
            'name'            => '',
            'initial_balance' => 0,
            'debit'           => 0,
            'credit'          => 0,
            'remission'       => 0,
            'commission'      => 0,
            'balance'         => 0,
            'status'          => 'Receivable',
        ];

        if (!empty($party_id)) {

            if (!empty($tran_id)) {
                $tranInfo = DB::select("SELECT parties.id, parties.name, parties.initial_balance, IFNULL(party_transactions.debit, 0) AS debit, IFNULL(party_transactions.credit, 0) AS credit, IFNULL(party_transactions.remission, 0) AS remission, IFNULL(party_transactions.commission, 0) AS commission FROM ( SELECT id, name, mobile, initial_balance FROM parties WHERE id='$party_id' AND deleted_at IS null )parties LEFT JOIN( SELECT party_id, SUM(debit) AS debit, SUM(credit) AS credit, SUM(remission) AS remission, SUM(commission) AS commission FROM party_transactions WHERE id < '$tran_id' AND deleted_at IS null GROUP BY party_id )party_transactions ON parties.id=party_transactions.party_id");
            } else {
                $tranInfo = DB::select("SELECT parties.id, parties.name, parties.initial_balance, IFNULL(party_transactions.debit, 0) AS debit, IFNULL(party_transactions.credit, 0) AS credit, IFNULL(party_transactions.remission, 0) AS remission, IFNULL(party_transactions.commission, 0) AS commission FROM ( SELECT id, name, mobile, initial_balance FROM parties WHERE id='$party_id' AND deleted_at IS null )parties LEFT JOIN( SELECT party_id, SUM(debit) AS debit, SUM(credit) AS credit, SUM(remission) AS remission, SUM(commission) AS commission FROM party_transactions WHERE deleted_at IS null GROUP BY party_id )party_transactions ON parties.id=party_transactions.party_id");
            }

            if (!empty($tranInfo)) {

                $balance = $tranInfo[0]->debit - $tranInfo[0]->credit + $tranInfo[0]->remission + $tranInfo[0]->commission + $tranInfo[0]->initial_balance;

                $data['id']              = $tranInfo[0]->id;
                $data['name']            = $tranInfo[0]->name;
                $data['initial_balance'] = $tranInfo[0]->initial_balance;
                $data['debit']           = $tranInfo[0]->debit;
                $data['credit']          = $tranInfo[0]->credit;
                $data['remission']       = $tranInfo[0]->remission;
                $data['commission']      = $tranInfo[0]->commission;
                $data['balance']         = $balance;
                $data['status']          = ($balance < 0 ? 'Payable' : 'Receivable');
            }
        }

        return (object)$data;
    }
}
