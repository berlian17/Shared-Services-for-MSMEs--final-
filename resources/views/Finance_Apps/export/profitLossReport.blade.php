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
    </tbody>
</table>