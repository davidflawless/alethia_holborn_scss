<?php
function column_widths($column_layout) {


    switch ($column_layout) {
        case "_30/70":
            $col_widths_array['col_1'] = 'col-md-6 col-xl-5 pe-xl-5';
            $col_widths_array['col_2'] = 'col-md-6 col-xl-7';
            break;
        case "_50/50":
            $col_widths_array['col_1'] = 'col-md-6 pe-xl-5';
            $col_widths_array['col_2'] = 'col-md-6 ps-xl-5';
            break;
        case "_70/30":
            $col_widths_array['col_1'] = 'col-md-6 col-xl-7 pe-xl-5';
            $col_widths_array['col_2'] = 'col-md-6 col-xl-5 ps-xl-5';
          break;
    }


    return $col_widths_array;
}
?>