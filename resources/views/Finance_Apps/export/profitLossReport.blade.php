<table>
    <thead>
        <tr>
            <th colspan="14" align="center">PROFIT AND LOSS</th>
        </tr>
        <tr>
            <th colspan="14" align="center">TAHUN {{ $year }}</th>
        </tr>
        <tr></tr>
    </thead>
    <tbody>
        <tr>
            <td align="center"><b>Keterangan</b></td>
            <td align="center"><b>Januari</b></td>
            <td align="center"><b>Februari</b></td>
            <td align="center"><b>Maret</b></td>
            <td align="center"><b>April</b></td>
            <td align="center"><b>Mei</b></td>
            <td align="center"><b>Juni</b></td>
            <td align="center"><b>Juli</b></td>
            <td align="center"><b>Agustus</b></td>
            <td align="center"><b>September</b></td>
            <td align="center"><b>Oktober</b></td>
            <td align="center"><b>November</b></td>
            <td align="center"><b>Desember</b></td>
        </tr>
        <tr>
            <td colspan="13"><b>Penjualan</b></td>
        </tr>
        <tr>
            <td>Sales</td>
            <td>Rp{{ number_format($salesMonth1, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth2, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth3, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth4, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth5, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth6, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth7, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth8, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth9, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth10, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth11, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth12, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td><b>Total Sales</b></td>
            <td>Rp{{ number_format($salesMonth1, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth2, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth3, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth4, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth5, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth6, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth7, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth8, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth9, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth10, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth11, 0, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth12, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td colspan="13"><b>HPP</b></td>
        </tr>
        <tr>
            <td>BI. Bahan baku</td>
            <td>Rp{{ isset($cogsArray1) ? number_format($cogsArray1->raw_material, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray2) ? number_format($cogsArray2->raw_material, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray3) ? number_format($cogsArray3->raw_material, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray4) ? number_format($cogsArray4->raw_material, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray5) ? number_format($cogsArray5->raw_material, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray6) ? number_format($cogsArray6->raw_material, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray7) ? number_format($cogsArray7->raw_material, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray8) ? number_format($cogsArray8->raw_material, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray9) ? number_format($cogsArray9->raw_material, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray10) ? number_format($cogsArray10->raw_material, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray11) ? number_format($cogsArray11->raw_material, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray12) ? number_format($cogsArray12->raw_material, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>BI. Tenaga kerja</td>
            <td>Rp{{ isset($cogsArray1) ? number_format($cogsArray1->manpower, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray2) ? number_format($cogsArray2->manpower, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray3) ? number_format($cogsArray3->manpower, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray4) ? number_format($cogsArray4->manpower, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray5) ? number_format($cogsArray5->manpower, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray6) ? number_format($cogsArray6->manpower, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray7) ? number_format($cogsArray7->manpower, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray8) ? number_format($cogsArray8->manpower, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray9) ? number_format($cogsArray9->manpower, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray10) ? number_format($cogsArray10->manpower, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray11) ? number_format($cogsArray11->manpower, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray12) ? number_format($cogsArray12->manpower, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>BI. Overhead pabrik</td>
            <td>Rp{{ isset($cogsArray1) ? number_format($cogsArray1->factory_overhead, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray2) ? number_format($cogsArray2->factory_overhead, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray3) ? number_format($cogsArray3->factory_overhead, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray4) ? number_format($cogsArray4->factory_overhead, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray5) ? number_format($cogsArray5->factory_overhead, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray6) ? number_format($cogsArray6->factory_overhead, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray7) ? number_format($cogsArray7->factory_overhead, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray8) ? number_format($cogsArray8->factory_overhead, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray9) ? number_format($cogsArray9->factory_overhead, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray10) ? number_format($cogsArray10->factory_overhead, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray11) ? number_format($cogsArray11->factory_overhead, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($cogsArray12) ? number_format($cogsArray12->factory_overhead, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td><b>Total HPP</b></td>
            <td><b>-Rp{{ isset($totalHPP1) ? number_format($totalHPP1, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalHPP2) ? number_format($totalHPP2, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalHPP3) ? number_format($totalHPP3, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalHPP4) ? number_format($totalHPP4, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalHPP5) ? number_format($totalHPP5, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalHPP6) ? number_format($totalHPP6, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalHPP7) ? number_format($totalHPP7, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalHPP8) ? number_format($totalHPP8, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalHPP9) ? number_format($totalHPP9, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalHPP10) ? number_format($totalHPP10, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalHPP11) ? number_format($totalHPP11, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalHPP12) ? number_format($totalHPP12, 0, ',', '.') : 0 }}</b></td>
        </tr>
        <tr>
            <td><b>Gross Profit/Loss</b></td>
            <td><b>Rp{{ number_format($gross1, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($gross2, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($gross3, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($gross4, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($gross5, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($gross6, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($gross7, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($gross8, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($gross9, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($gross10, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($gross11, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($gross12, 0, ',', '.') }}</b></td>
        </tr>
        <tr>
            <td colspan="13"><b>BI. Penjualan</b></td>
        </tr>
        <tr>
            <td>BI. Adm e-commerce</td>
            <td>Rp{{ isset($sseArray1) ? number_format($sseArray1->adm_ecommerce, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray2) ? number_format($sseArray2->adm_ecommerce, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray3) ? number_format($sseArray3->adm_ecommerce, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray4) ? number_format($sseArray4->adm_ecommerce, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray5) ? number_format($sseArray5->adm_ecommerce, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray6) ? number_format($sseArray6->adm_ecommerce, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray7) ? number_format($sseArray7->adm_ecommerce, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray8) ? number_format($sseArray8->adm_ecommerce, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray9) ? number_format($sseArray9->adm_ecommerce, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray10) ? number_format($sseArray10->adm_ecommerce, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray11) ? number_format($sseArray11->adm_ecommerce, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray12) ? number_format($sseArray12->adm_ecommerce, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>BI. Gaji marketing</td>
            <td>Rp{{ isset($sseArray1) ? number_format($sseArray1->marketing_salary, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray2) ? number_format($sseArray2->marketing_salary, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray3) ? number_format($sseArray3->marketing_salary, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray4) ? number_format($sseArray4->marketing_salary, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray5) ? number_format($sseArray5->marketing_salary, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray6) ? number_format($sseArray6->marketing_salary, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray7) ? number_format($sseArray7->marketing_salary, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray8) ? number_format($sseArray8->marketing_salary, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray9) ? number_format($sseArray9->marketing_salary, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray10) ? number_format($sseArray10->marketing_salary, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray11) ? number_format($sseArray11->marketing_salary, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray12) ? number_format($sseArray12->marketing_salary, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>Operasional marketing</td>
            <td>Rp{{ isset($sseArray1) ? number_format($sseArray1->marketing_operations, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray2) ? number_format($sseArray2->marketing_operations, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray3) ? number_format($sseArray3->marketing_operations, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray4) ? number_format($sseArray4->marketing_operations, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray5) ? number_format($sseArray5->marketing_operations, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray6) ? number_format($sseArray6->marketing_operations, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray7) ? number_format($sseArray7->marketing_operations, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray8) ? number_format($sseArray8->marketing_operations, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray9) ? number_format($sseArray9->marketing_operations, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray10) ? number_format($sseArray10->marketing_operations, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray11) ? number_format($sseArray11->marketing_operations, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray12) ? number_format($sseArray12->marketing_operations, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>BI. Lain-lain marketing</td>
            <td>Rp{{ isset($sseArray1) ? number_format($sseArray1->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray2) ? number_format($sseArray2->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray3) ? number_format($sseArray3->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray4) ? number_format($sseArray4->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray5) ? number_format($sseArray5->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray6) ? number_format($sseArray6->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray7) ? number_format($sseArray7->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray8) ? number_format($sseArray8->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray9) ? number_format($sseArray9->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray10) ? number_format($sseArray10->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray11) ? number_format($sseArray11->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($sseArray12) ? number_format($sseArray12->other_cost, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td><b>Total Sales dan Service Expenses</b></td>
            <td><b>-Rp{{ isset($totalSSE1) ? number_format($totalSSE1, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalSSE2) ? number_format($totalSSE2, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalSSE3) ? number_format($totalSSE3, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalSSE4) ? number_format($totalSSE4, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalSSE5) ? number_format($totalSSE5, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalSSE6) ? number_format($totalSSE6, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalSSE7) ? number_format($totalSSE7, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalSSE8) ? number_format($totalSSE8, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalSSE9) ? number_format($totalSSE9, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalSSE10) ? number_format($totalSSE10, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalSSE11) ? number_format($totalSSE11, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalSSE12) ? number_format($totalSSE12, 0, ',', '.') : 0 }}</b></td>
        </tr>
        <tr>
            <td><b>Operating Income (After Sales dan Service Exp.)</b></td>
            <td><b>Rp{{ number_format($operatingIncome1, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($operatingIncome2, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($operatingIncome3, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($operatingIncome4, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($operatingIncome5, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($operatingIncome6, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($operatingIncome7, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($operatingIncome8, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($operatingIncome9, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($operatingIncome10, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($operatingIncome11, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($operatingIncome12, 0, ',', '.') }}</b></td>
        </tr>
        <tr>
            <td colspan="13"><b>BI. Adm dan Umum</b></td>
        </tr>
        <tr>
            <td>BI. Gaji dan tunjangan</td>
            <td>Rp{{ isset($gacArray1) ? number_format($gacArray1->salaries_and_allowances, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray2) ? number_format($gacArray2->salaries_and_allowances, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray3) ? number_format($gacArray3->salaries_and_allowances, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray4) ? number_format($gacArray4->salaries_and_allowances, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray5) ? number_format($gacArray5->salaries_and_allowances, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray6) ? number_format($gacArray6->salaries_and_allowances, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray7) ? number_format($gacArray7->salaries_and_allowances, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray8) ? number_format($gacArray8->salaries_and_allowances, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray9) ? number_format($gacArray9->salaries_and_allowances, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray10) ? number_format($gacArray10->salaries_and_allowances, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray11) ? number_format($gacArray11->salaries_and_allowances, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray12) ? number_format($gacArray12->salaries_and_allowances, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>BI. Listrik dan air</td>
            <td>Rp{{ isset($gacArray1) ? number_format($gacArray1->electricity_and_water, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray2) ? number_format($gacArray2->electricity_and_water, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray3) ? number_format($gacArray3->electricity_and_water, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray4) ? number_format($gacArray4->electricity_and_water, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray5) ? number_format($gacArray5->electricity_and_water, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray6) ? number_format($gacArray6->electricity_and_water, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray7) ? number_format($gacArray7->electricity_and_water, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray8) ? number_format($gacArray8->electricity_and_water, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray9) ? number_format($gacArray9->electricity_and_water, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray10) ? number_format($gacArray10->electricity_and_water, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray11) ? number_format($gacArray11->electricity_and_water, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray12) ? number_format($gacArray12->electricity_and_water, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>BI. Transportasi</td>
            <td>Rp{{ isset($gacArray1) ? number_format($gacArray1->transportation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray2) ? number_format($gacArray2->transportation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray3) ? number_format($gacArray3->transportation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray4) ? number_format($gacArray4->transportation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray5) ? number_format($gacArray5->transportation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray6) ? number_format($gacArray6->transportation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray7) ? number_format($gacArray7->transportation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray8) ? number_format($gacArray8->transportation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray9) ? number_format($gacArray9->transportation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray10) ? number_format($gacArray10->transportation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray11) ? number_format($gacArray11->transportation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray12) ? number_format($gacArray12->transportation, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>BI. Komunikasi</td>
            <td>Rp{{ isset($gacArray1) ? number_format($gacArray1->communication, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray2) ? number_format($gacArray2->communication, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray3) ? number_format($gacArray3->communication, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray4) ? number_format($gacArray4->communication, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray5) ? number_format($gacArray5->communication, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray6) ? number_format($gacArray6->communication, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray7) ? number_format($gacArray7->communication, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray8) ? number_format($gacArray8->communication, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray9) ? number_format($gacArray9->communication, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray10) ? number_format($gacArray10->communication, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray11) ? number_format($gacArray11->communication, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray12) ? number_format($gacArray12->communication, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>BI. ATK</td>
            <td>Rp{{ isset($gacArray1) ? number_format($gacArray1->office_stationery, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray2) ? number_format($gacArray2->office_stationery, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray3) ? number_format($gacArray3->office_stationery, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray4) ? number_format($gacArray4->office_stationery, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray5) ? number_format($gacArray5->office_stationery, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray6) ? number_format($gacArray6->office_stationery, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray7) ? number_format($gacArray7->office_stationery, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray8) ? number_format($gacArray8->office_stationery, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray9) ? number_format($gacArray9->office_stationery, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray10) ? number_format($gacArray10->office_stationery, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray11) ? number_format($gacArray11->office_stationery, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray12) ? number_format($gacArray12->office_stationery, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>BI. Konsultan</td>
            <td>Rp{{ isset($gacArray1) ? number_format($gacArray1->consultant, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray2) ? number_format($gacArray2->consultant, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray3) ? number_format($gacArray3->consultant, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray4) ? number_format($gacArray4->consultant, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray5) ? number_format($gacArray5->consultant, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray6) ? number_format($gacArray6->consultant, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray7) ? number_format($gacArray7->consultant, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray8) ? number_format($gacArray8->consultant, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray9) ? number_format($gacArray9->consultant, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray10) ? number_format($gacArray10->consultant, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray11) ? number_format($gacArray11->consultant, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray12) ? number_format($gacArray12->consultant, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>BI. Kebersihan dan keamanan</td>
            <td>Rp{{ isset($gacArray1) ? number_format($gacArray1->cleanliness_and_security, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray2) ? number_format($gacArray2->cleanliness_and_security, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray3) ? number_format($gacArray3->cleanliness_and_security, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray4) ? number_format($gacArray4->cleanliness_and_security, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray5) ? number_format($gacArray5->cleanliness_and_security, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray6) ? number_format($gacArray6->cleanliness_and_security, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray7) ? number_format($gacArray7->cleanliness_and_security, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray8) ? number_format($gacArray8->cleanliness_and_security, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray9) ? number_format($gacArray9->cleanliness_and_security, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray10) ? number_format($gacArray10->cleanliness_and_security, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray11) ? number_format($gacArray11->cleanliness_and_security, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray12) ? number_format($gacArray12->cleanliness_and_security, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>BI. Pemeliharaan dan renovasi</td>
            <td>Rp{{ isset($gacArray1) ? number_format($gacArray1->maintenance_and_renovation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray2) ? number_format($gacArray2->maintenance_and_renovation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray3) ? number_format($gacArray3->maintenance_and_renovation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray4) ? number_format($gacArray4->maintenance_and_renovation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray5) ? number_format($gacArray5->maintenance_and_renovation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray6) ? number_format($gacArray6->maintenance_and_renovation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray7) ? number_format($gacArray7->maintenance_and_renovation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray8) ? number_format($gacArray8->maintenance_and_renovation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray9) ? number_format($gacArray9->maintenance_and_renovation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray10) ? number_format($gacArray10->maintenance_and_renovation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray11) ? number_format($gacArray11->maintenance_and_renovation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray12) ? number_format($gacArray12->maintenance_and_renovation, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>BI. Penyusutan</td>
            <td>Rp{{ isset($gacArray1) ? number_format($gacArray1->depreciation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray2) ? number_format($gacArray2->depreciation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray3) ? number_format($gacArray3->depreciation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray4) ? number_format($gacArray4->depreciation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray5) ? number_format($gacArray5->depreciation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray6) ? number_format($gacArray6->depreciation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray7) ? number_format($gacArray7->depreciation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray8) ? number_format($gacArray8->depreciation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray9) ? number_format($gacArray9->depreciation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray10) ? number_format($gacArray10->depreciation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray11) ? number_format($gacArray11->depreciation, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray12) ? number_format($gacArray12->depreciation, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>BI. Pajak</td>
            <td>Rp{{ isset($gacArray1) ? number_format($gacArray1->tax, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray2) ? number_format($gacArray2->tax, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray3) ? number_format($gacArray3->tax, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray4) ? number_format($gacArray4->tax, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray5) ? number_format($gacArray5->tax, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray6) ? number_format($gacArray6->tax, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray7) ? number_format($gacArray7->tax, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray8) ? number_format($gacArray8->tax, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray9) ? number_format($gacArray9->tax, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray10) ? number_format($gacArray10->tax, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray11) ? number_format($gacArray11->tax, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray12) ? number_format($gacArray12->tax, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td>BI. Adm dan umum lainnya</td>
            <td>Rp{{ isset($gacArray1) ? number_format($gacArray1->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray2) ? number_format($gacArray2->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray3) ? number_format($gacArray3->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray4) ? number_format($gacArray4->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray5) ? number_format($gacArray5->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray6) ? number_format($gacArray6->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray7) ? number_format($gacArray7->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray8) ? number_format($gacArray8->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray9) ? number_format($gacArray9->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray10) ? number_format($gacArray10->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray11) ? number_format($gacArray11->other_cost, 0, ',', '.') : 0 }}</td>
            <td>Rp{{ isset($gacArray12) ? number_format($gacArray12->other_cost, 0, ',', '.') : 0 }}</td>
        </tr>
        <tr>
            <td><b>Total Adm dan Umum</b></td>
            <td><b>-Rp{{ isset($totalGAC1) ? number_format($totalGAC1, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalGAC2) ? number_format($totalGAC2, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalGAC3) ? number_format($totalGAC3, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalGAC4) ? number_format($totalGAC4, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalGAC5) ? number_format($totalGAC5, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalGAC6) ? number_format($totalGAC6, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalGAC7) ? number_format($totalGAC7, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalGAC8) ? number_format($totalGAC8, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalGAC9) ? number_format($totalGAC9, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalGAC10) ? number_format($totalGAC10, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalGAC11) ? number_format($totalGAC11, 0, ',', '.') : 0 }}</b></td>
            <td><b>-Rp{{ isset($totalGAC12) ? number_format($totalGAC12, 0, ',', '.') : 0 }}</b></td>
        </tr>
        <tr>
            <td><b>Net Operating Income</b></td>
            <td><b>Rp{{ number_format($net1, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($net2, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($net3, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($net4, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($net5, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($net6, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($net7, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($net8, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($net9, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($net10, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($net11, 0, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($net12, 0, ',', '.') }}</b></td>
        </tr>
    </tbody>
</table>