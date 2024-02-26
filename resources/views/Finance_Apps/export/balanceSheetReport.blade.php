<table>
    <thead>
        <tr>
            <th colspan="3" align="center"><b>BALANCE SHEET</b></th>
        </tr>
        <tr>
            <th colspan="3" align="center"><b>PER TANGGAL {{ date("d/m/Y", strtotime($dateStart)) }} - {{ date("d/m/Y", strtotime($dateEnd)) }}</b></th>
        </tr>
        <tr></tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="3"><b>Aset Lancar</b></td>
        </tr>
        <tr>
            <td></td>
            <td>Kas dan setara kas</td>
            <td>Rp{{ number_format($cashCA, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Piutang usaha</td>
            <td>Rp{{ number_format($accountsReceivableCA, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Persediaan</td>
            <td>Rp{{ number_format($suppliesCA, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Aset lancar lainnya</td>
            <td>Rp{{ number_format($otherCA, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td colspan="2"><b>Jumlah aset lancar</b></td>
            <td><b>Rp{{ number_format($totalCA, 2, ',', '.') }}</b></td>
        </tr>
        <tr>
            <td colspan="3"><b>Aset Tidak Lancar</b></td>
        </tr>
        <tr>
            <td></td>
            <td>Aset tetap</td>
            <td>Rp{{ number_format($fixedAssetsNCA, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Akumulasi penyusutan</td>
            <td>-Rp{{ number_format($depreciationNCA, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td colspan="2"><b>Jumlah aset tidak lancar</b></td>
            <td><b>Rp{{ number_format($totalNCA, 2, ',', '.') }}</b></td>
        </tr>
        <tr>
            <td colspan="2"><b>Jumlah aset</b></td>
            <td><b>Rp{{ number_format($totalAsset, 2, ',', '.') }}</b></td>
        </tr>
    </tbody>
</table>