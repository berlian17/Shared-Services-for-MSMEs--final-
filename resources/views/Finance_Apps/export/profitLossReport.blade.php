<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="14">PROFIT & LOSS</th>
        </tr>
        <tr>
            <th colspan="14">TAHUN 2024</th>
        </tr>
        <tr></tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-center"><b>Keterangan</b></td>
            <td class="text-center"><b>Januari</b></td>
            <td class="text-center"><b>Februari</b></td>
            <td class="text-center"><b>Maret</b></td>
            <td class="text-center"><b>April</b></td>
            <td class="text-center"><b>Mei</b></td>
            <td class="text-center"><b>Juni</b></td>
            <td class="text-center"><b>Juli</b></td>
            <td class="text-center"><b>Agustus</b></td>
            <td class="text-center"><b>September</b></td>
            <td class="text-center"><b>Oktober</b></td>
            <td class="text-center"><b>November</b></td>
            <td class="text-center"><b>Desember</b></td>
        </tr>
        <tr>
            <td colspan="13" class="table-secondary"><b>Penjualan</b></td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">Sales</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td class="table-warning"><b>Total Sales</b></td>
            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
            <td class="table-warning"><b>Rp ' . number_format(0, 0, ',', '.') . '</b></td>
        </tr>
        <tr>
            <td colspan="13" class="table-secondary"><b>HPP</b></td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Bahan baku</td>
            <td>Rp ' . (isset($cogsArray[0]) ? number_format($cogsArray[0]->raw_material, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[1]) ? number_format($cogsArray[1]->raw_material, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[2]) ? number_format($cogsArray[2]->raw_material, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[3]) ? number_format($cogsArray[3]->raw_material, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[4]) ? number_format($cogsArray[4]->raw_material, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[5]) ? number_format($cogsArray[5]->raw_material, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[6]) ? number_format($cogsArray[6]->raw_material, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[7]) ? number_format($cogsArray[7]->raw_material, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[8]) ? number_format($cogsArray[8]->raw_material, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[9]) ? number_format($cogsArray[9]->raw_material, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[10]) ? number_format($cogsArray[10]->raw_material, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[11]) ? number_format($cogsArray[11]->raw_material, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px">BI. Tenaga kerja</td>
            <td>Rp ' . (isset($cogsArray[0]) ? number_format($cogsArray[0]->manpower, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[1]) ? number_format($cogsArray[1]->manpower, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[2]) ? number_format($cogsArray[2]->manpower, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[3]) ? number_format($cogsArray[3]->manpower, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[4]) ? number_format($cogsArray[4]->manpower, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[5]) ? number_format($cogsArray[5]->manpower, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[6]) ? number_format($cogsArray[6]->manpower, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[7]) ? number_format($cogsArray[7]->manpower, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[8]) ? number_format($cogsArray[8]->manpower, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[9]) ? number_format($cogsArray[9]->manpower, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[10]) ? number_format($cogsArray[10]->manpower, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[11]) ? number_format($cogsArray[11]->manpower, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Overhead pabrik</td>
            <td>Rp ' . (isset($cogsArray[0]) ? number_format($cogsArray[0]->factory_overhead, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[1]) ? number_format($cogsArray[1]->factory_overhead, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[2]) ? number_format($cogsArray[2]->factory_overhead, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[3]) ? number_format($cogsArray[3]->factory_overhead, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[4]) ? number_format($cogsArray[4]->factory_overhead, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[5]) ? number_format($cogsArray[5]->factory_overhead, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[6]) ? number_format($cogsArray[6]->factory_overhead, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[7]) ? number_format($cogsArray[7]->factory_overhead, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[8]) ? number_format($cogsArray[8]->factory_overhead, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[9]) ? number_format($cogsArray[9]->factory_overhead, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[10]) ? number_format($cogsArray[10]->factory_overhead, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($cogsArray[11]) ? number_format($cogsArray[11]->factory_overhead, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td class="table-warning"><b>Total HPP</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalHPP[0]) ? number_format($totalHPP[0], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalHPP[1]) ? number_format($totalHPP[1], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalHPP[2]) ? number_format($totalHPP[2], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalHPP[3]) ? number_format($totalHPP[3], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalHPP[4]) ? number_format($totalHPP[4], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalHPP[5]) ? number_format($totalHPP[5], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalHPP[6]) ? number_format($totalHPP[6], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalHPP[7]) ? number_format($totalHPP[7], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalHPP[8]) ? number_format($totalHPP[8], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalHPP[9]) ? number_format($totalHPP[9], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalHPP[10]) ? number_format($totalHPP[10], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalHPP[11]) ? number_format($totalHPP[11], 0, ',', '.') : "0") . '</b></td>
        </tr>
        <tr>
            <td class="table-info"><b>Gross Profit/Loss</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[0]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[1]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[2]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[3]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[4]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[5]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[6]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[7]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[8]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[9]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[10]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[11]), 0, ',', '.')) . '</b></td>
        </tr>
        <tr>
            <td colspan="13" class="table-secondary"><b>BI. Penjualan</b></td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Adm e-commerce</td>
            <td>Rp ' . (isset($sseArray[0]) ? number_format($sseArray[0]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[1]) ? number_format($sseArray[1]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[2]) ? number_format($sseArray[2]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[3]) ? number_format($sseArray[3]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[4]) ? number_format($sseArray[4]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[5]) ? number_format($sseArray[5]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[6]) ? number_format($sseArray[6]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[7]) ? number_format($sseArray[7]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[8]) ? number_format($sseArray[8]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[9]) ? number_format($sseArray[9]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[10]) ? number_format($sseArray[10]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[11]) ? number_format($sseArray[11]->adm_ecommerce, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Gaji marketing</td>
            <td>Rp ' . (isset($sseArray[0]) ? number_format($sseArray[0]->marketing_salary, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[1]) ? number_format($sseArray[1]->marketing_salary, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[2]) ? number_format($sseArray[2]->marketing_salary, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[3]) ? number_format($sseArray[3]->marketing_salary, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[4]) ? number_format($sseArray[4]->marketing_salary, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[5]) ? number_format($sseArray[5]->marketing_salary, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[6]) ? number_format($sseArray[6]->marketing_salary, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[7]) ? number_format($sseArray[7]->marketing_salary, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[8]) ? number_format($sseArray[8]->marketing_salary, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[9]) ? number_format($sseArray[9]->marketing_salary, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[10]) ? number_format($sseArray[10]->marketing_salary, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[11]) ? number_format($sseArray[11]->marketing_salary, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">Operasional marketing</td>
            <td>Rp ' . (isset($sseArray[0]) ? number_format($sseArray[0]->marketing_operations, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[1]) ? number_format($sseArray[1]->marketing_operations, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[2]) ? number_format($sseArray[2]->marketing_operations, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[3]) ? number_format($sseArray[3]->marketing_operations, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[4]) ? number_format($sseArray[4]->marketing_operations, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[5]) ? number_format($sseArray[5]->marketing_operations, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[6]) ? number_format($sseArray[6]->marketing_operations, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[7]) ? number_format($sseArray[7]->marketing_operations, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[8]) ? number_format($sseArray[8]->marketing_operations, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[9]) ? number_format($sseArray[9]->marketing_operations, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[10]) ? number_format($sseArray[10]->marketing_operations, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[11]) ? number_format($sseArray[11]->marketing_operations, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Lain marketing</td>
            <td>Rp ' . (isset($sseArray[0]) ? number_format($sseArray[0]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[1]) ? number_format($sseArray[1]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[2]) ? number_format($sseArray[2]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[3]) ? number_format($sseArray[3]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[4]) ? number_format($sseArray[4]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[5]) ? number_format($sseArray[5]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[6]) ? number_format($sseArray[6]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[7]) ? number_format($sseArray[7]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[8]) ? number_format($sseArray[8]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[9]) ? number_format($sseArray[9]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[10]) ? number_format($sseArray[10]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($sseArray[11]) ? number_format($sseArray[11]->other_cost, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td class="table-warning"><b>Total Sales & Service Expenses</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalSSE[0]) ? number_format($totalSSE[0], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalSSE[1]) ? number_format($totalSSE[1], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalSSE[2]) ? number_format($totalSSE[2], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalSSE[3]) ? number_format($totalSSE[3], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalSSE[4]) ? number_format($totalSSE[4], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalSSE[5]) ? number_format($totalSSE[5], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalSSE[6]) ? number_format($totalSSE[6], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalSSE[7]) ? number_format($totalSSE[7], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalSSE[8]) ? number_format($totalSSE[8], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalSSE[9]) ? number_format($totalSSE[9], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalSSE[10]) ? number_format($totalSSE[10], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalSSE[11]) ? number_format($totalSSE[11], 0, ',', '.') : "0") . '</b></td>
        </tr>
        <tr>
            <td class="table-info"><b>Operating Income (After Sales and Service Exp.)</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[0] - $totalSSE[0]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[1] - $totalSSE[1]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[2] - $totalSSE[2]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[3] - $totalSSE[3]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[4] - $totalSSE[4]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[5] - $totalSSE[5]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[6] - $totalSSE[6]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[7] - $totalSSE[7]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[8] - $totalSSE[8]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[9] - $totalSSE[9]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[10] - $totalSSE[10]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[11] - $totalSSE[11]), 0, ',', '.')) . '</b></td>
        </tr>
        <tr>
            <td colspan="13" class="table-secondary"><b>BI. Adm & Umum</b></td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Gaji & tunjangan</td>
            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->salaries_and_allowances, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Listrik dan air</td>
            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->electricity_and_water, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->electricity_and_water, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->electricity_and_water, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->electricity_and_water, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->electricity_and_water, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->electricity_and_water, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->electricity_and_water, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->electricity_and_water, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->electricity_and_water, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->electricity_and_water, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->electricity_and_water, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->electricity_and_water, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Transportasi</td>
            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->transportation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->transportation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->transportation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->transportation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->transportation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->transportation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->transportation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->transportation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->transportation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->transportation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->transportation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->transportation, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Komunikasi</td>
            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->communication, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->communication, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->communication, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->communication, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->communication, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->communication, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->communication, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->communication, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->communication, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->communication, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->communication, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->communication, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. ATK</td>
            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->office_stationery, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->office_stationery, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->office_stationery, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->office_stationery, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->office_stationery, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->office_stationery, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->office_stationery, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->office_stationery, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->office_stationery, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->office_stationery, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->office_stationery, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->office_stationery, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Konsultan</td>
            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->consultant, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->consultant, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->consultant, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->consultant, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->consultant, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->consultant, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->consultant, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->consultant, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->consultant, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->consultant, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->consultant, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->consultant, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Kebersihan & keamanan</td>
            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->cleanliness_and_security, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Pemeliharaan & renovasi</td>
            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->maintenance_and_renovation, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Penyusutan</td>
            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->depreciation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->depreciation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->depreciation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->depreciation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->depreciation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->depreciation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->depreciation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->depreciation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->depreciation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->depreciation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->depreciation, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->depreciation, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Pajak</td>
            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->tax, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->tax, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->tax, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->tax, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->tax, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->tax, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->tax, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->tax, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->tax, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->tax, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->tax, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->tax, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td style="text-indent: 40px;">BI. Adm & umum lainnya</td>
            <td>Rp ' . (isset($gacArray[0]) ? number_format($gacArray[0]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[1]) ? number_format($gacArray[1]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[2]) ? number_format($gacArray[2]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[3]) ? number_format($gacArray[3]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[4]) ? number_format($gacArray[4]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[5]) ? number_format($gacArray[5]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[6]) ? number_format($gacArray[6]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[7]) ? number_format($gacArray[7]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[8]) ? number_format($gacArray[8]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[9]) ? number_format($gacArray[9]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[10]) ? number_format($gacArray[10]->other_cost, 0, ',', '.') : "0") . '</td>
            <td>Rp ' . (isset($gacArray[11]) ? number_format($gacArray[11]->other_cost, 0, ',', '.') : "0") . '</td>
        </tr>
        <tr>
            <td class="table-warning"><b>Total Adm & Umum</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalGAC[0]) ? number_format($totalGAC[0], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalGAC[1]) ? number_format($totalGAC[1], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalGAC[2]) ? number_format($totalGAC[2], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalGAC[3]) ? number_format($totalGAC[3], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalGAC[4]) ? number_format($totalGAC[4], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalGAC[5]) ? number_format($totalGAC[5], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalGAC[6]) ? number_format($totalGAC[6], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalGAC[7]) ? number_format($totalGAC[7], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalGAC[8]) ? number_format($totalGAC[8], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalGAC[9]) ? number_format($totalGAC[9], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalGAC[10]) ? number_format($totalGAC[10], 0, ',', '.') : "0") . '</b></td>
            <td class="table-warning"><b>Rp ' . (isset($totalGAC[11]) ? number_format($totalGAC[11], 0, ',', '.') : "0") . '</b></td>
        </tr>
        <tr>
            <td class="table-info"><b>Net Operating Income</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[0] - $totalSSE[0] - $totalGAC[0]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[1] - $totalSSE[1] - $totalGAC[1]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[2] - $totalSSE[2] - $totalGAC[2]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[3] - $totalSSE[3] - $totalGAC[3]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[4] - $totalSSE[4] - $totalGAC[4]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[5] - $totalSSE[5] - $totalGAC[5]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[6] - $totalSSE[6] - $totalGAC[6]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[7] - $totalSSE[7] - $totalGAC[7]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[8] - $totalSSE[8] - $totalGAC[8]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[9] - $totalSSE[9] - $totalGAC[9]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[10] - $totalSSE[10] - $totalGAC[10]), 0, ',', '.')) . '</b></td>
            <td class="table-info"><b>Rp ' . (number_format((0 - $totalHPP[11] - $totalSSE[11] - $totalGAC[11]), 0, ',', '.')) . '</b></td>
        </tr>
    </tbody>
</table>