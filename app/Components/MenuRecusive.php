<?php


namespace App\Components;
use App\Models\Menu;

class MenuRecusive
{
    private $html;
    public function __construct()
    {
        $this->html = ''; //nối các option với nhau

    }
    public function menuRecusiveAdd($parenId = 0,$subMark = '' )
    {
        $data = Menu::where('parent_id', $parenId)->get();
        foreach ($data as $dataItem) {
            $this->html .= '<option value="' . $dataItem->id . '"> ' . $subMark . $dataItem->name . '</option>';
            $this->menuRecusiveAdd($dataItem->id, $subMark . '--');
        }
        return $this->html;
    }

    public function menuRecusiveEdit($parenIdMenuEdit ,$parenId = 0,$subMark = '' )
    {
        $data = Menu::where('parent_id', $parenId)->get();
        foreach ($data as $dataItem) {
            if ($parenIdMenuEdit == $dataItem->id) {
                $this->html .= '<option selected value="' . $dataItem->id . '"> ' . $subMark . $dataItem->name . '</option>';
            } else {
                $this->html .= '<option value="' . $dataItem->id . '"> ' . $subMark . $dataItem->name . '</option>';
            }
            $this->menuRecusiveEdit($parenIdMenuEdit, $dataItem->id, $subMark . '--');
        }
        return $this->html;
    }
}
