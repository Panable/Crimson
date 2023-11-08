<?php
class order extends controller
{
    public function __construct()
    {
        $this->postModel = $this->model('ordermodel');
    }

    private function generateUserCartData()
    {
        $raw_data = getSession('UserCart');
        $ids = '';

        $total = 0;

        foreach ($raw_data as $key => $value) {
            if ($value == '0')
                continue;
            if (empty($ids))
                $ids = $key;
            else
                $ids = $ids . ',' . $key;
        }
        $raw_table_data = $this->postModel->getNamePrice($ids);

        foreach ($raw_table_data as $item) {
            $item->quantity = $raw_data[$item->id];
            $item->total = round((double) $item->quantity * (double) $item->price, 2);
            $total += $item->total;
        }

        $data['items'] = $raw_table_data;
        $data['total'] = $total;
        return $data;
    }

    public function userCheckout()
    {
        $data = $this->generateUserCartData();
        $this->view('order/userCheckout', $data);
    }
}
