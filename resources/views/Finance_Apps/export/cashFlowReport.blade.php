<table>
    <thead>
        <tr>
            <th colspan="13" align="center"><b>CASH FLOW</b></th>
        </tr>
        <tr>
            <th colspan="13" align="center"><b>TAHUN {{ $year }}</b></th>
        </tr>
        <tr></tr>
    </thead>
    <tbody>
        <tr>
            <td align="center"><b>Item</b></td>
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
            <td>Cash In</td>
            <td>Rp{{ number_format($ci, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($total1, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($total2, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($total3, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($total4, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($total5, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($total6, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($total7, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($total8, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($total9, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($total10, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($total11, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Sales</td>
            <td>Rp{{ number_format($salesMonth1, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth2, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth3, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth4, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth5, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth6, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth7, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth8, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth9, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth10, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth11, 2, ',', '.') }}</td>
            <td>Rp{{ number_format($salesMonth12, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Cost of Goods Sold</td>
            <td>-Rp{{ number_format($cogsArray1, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($cogsArray2, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($cogsArray3, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($cogsArray4, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($cogsArray5, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($cogsArray6, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($cogsArray7, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($cogsArray8, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($cogsArray9, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($cogsArray10, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($cogsArray11, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($cogsArray12, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Selling and Service Expenses</td>
            <td>-Rp{{ number_format($sseArray1, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($sseArray2, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($sseArray3, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($sseArray4, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($sseArray5, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($sseArray6, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($sseArray7, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($sseArray8, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($sseArray9, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($sseArray10, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($sseArray11, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($sseArray12, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>General and Admin Cost</td>
            <td>-Rp{{ number_format($gacArray1, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($gacArray2, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($gacArray3, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($gacArray4, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($gacArray5, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($gacArray6, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($gacArray7, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($gacArray8, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($gacArray9, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($gacArray10, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($gacArray11, 2, ',', '.') }}</td>
            <td>-Rp{{ number_format($gacArray12, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td></td>
            <td><b>Rp{{ number_format($total1, 2, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($total2, 2, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($total3, 2, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($total4, 2, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($total5, 2, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($total6, 2, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($total7, 2, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($total8, 2, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($total9, 2, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($total10, 2, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($total11, 2, ',', '.') }}</b></td>
            <td><b>Rp{{ number_format($total12, 2, ',', '.') }}</b></td>
        </tr>
    </tbody>
</table>