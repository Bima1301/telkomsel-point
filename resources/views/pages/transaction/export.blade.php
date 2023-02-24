<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>MSISDN</th>
            <th>Customer</th>
            <th>Merchandise</th>
            <th>CS Name</th>
        </tr>
    </thead>
    @foreach ($transaction as $transaction)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ date('j F, Y', strtotime($transaction->date)) }}</td>
            <td>{{ $transaction->msisdn }}</td>
            <td>{{ $transaction->customer }}</td>
            <td>{{ $transaction->merch_name }} ( {{ date('j F, Y', strtotime($transaction->store_stock_date)) }}  )</td>
            <td>{{ $transaction->cs_name }}</td>
        </tr>
    @endforeach
</table>
