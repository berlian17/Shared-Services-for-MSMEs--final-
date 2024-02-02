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
            <td class="table-primary" colspan="3"><b>Aset Lancar</b></td>
        </tr>
        <tr>
            <td></td>
            <td>Kas dan setara kas</td>
            <td>{{ $cashCA }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Piutang usaha</td>
            <td>{{ $accountsReceivableCA }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Persediaan</td>
            <td>{{ $suppliesCA }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Aset lancar lainnya</td>
            <td>{{ $otherCA }}</td>
        </tr>
        <tr>
            <td colspan="2"><b>Jumlah aset lancar</b></td>
            <td><b>{{ $totalCA }}</b></td>
        </tr>
        <tr>
            <td class="table-primary" colspan="3"><b>Aset Tidak Lancar</b></td>
        </tr>
        <tr>
            <td></td>
            <td>Aset tetap</td>
            <td>{{ $fixedAssetsNCA }}</td>
        </tr>
        <tr>
            <td></td>
            <td>Akumulasi penyusutan</td>
            <td>{{ $depreciationNCA }}</td>
        </tr>
        <tr>
            <td colspan="2"><b>Jumlah aset tidak lancar</b></td>
            <td><b>{{ $totalNCA }}</b></td>
        </tr>
        <tr>
            <td class="table-warning" colspan="2"><b>Jumlah aset</b></td>
            <td class="table-warning"><b>{{ $totalAsset }}</b></td>
        </tr>
    </tbody>
</table>