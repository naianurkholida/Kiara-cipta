<h3 style="text-align: center;">History Customer</h3>
<table border="1" cellpadding="0" cellspacing="0" width="100%">
    <thead>
        <tr class="text-center">
            <th style="padding:10px;">Date</th>
            <th style="padding:10px;">Trx No</th>
            <th style="padding:10px;">Amount</th>
            <th style="padding:10px;">Point</th>
        </tr>
    </thead>
    <tbody>
        @foreach($history as $val)
        <tr>
            <td style="padding:7px;">{{ $val[0] }}</td>
            <td style="padding:7px;">{{ $val[1] }}</td>
            <td style="padding:7px;">{{ $val[2] }}</td>
            <td style="padding:7px;">{{ $val[3] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<script type="text/javascript">
    window.print()
</script>