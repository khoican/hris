<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Slip Gaji</title>
</head>

<body>
    <div class="container my-3 w-full">
        <h1 class="fs-3">Slip Gaji</h1>

        <div class="w-100 px-4 py-3">
            <table>
                <tr>
                    <td class="fw-bold" style="width: 40%">ID Karyawan</td>
                    <td class="text-center" style="width: 10%">:</td>
                    <td style="width: 50%">{{ $payroll->id }}</td>
                </tr>
                <tr>
                    <td class="fw-bold" style="width: 40%">Nama Karyawan</td>
                    <td class="text-center" style="width: 10%">:</td>
                    <td style="width: 50%">{{ $payroll->name }}</td>
                </tr>
                <tr>
                    <td class="fw-bold" style="width: 40%">Jabatan - Divisi</td>
                    <td class="text-center" style="width: 10%">:</td>
                    <td style="width: 50%">{{ $payroll->position }}</td>
                </tr>
                <tr>
                    <td class="fw-bold" style="width: 40%">Gaji Pokok</td>
                    <td class="text-center" style="width: 10%">:</td>
                    <td style="width: 50%">Rp. {{ number_format($payroll->basic_salary) }}</td>
                </tr>
                <tr>
                    <td class="fw-bold" style="width: 40%">Asuransi</td>
                    <td class="text-center" style="width: 10%">:</td>
                    <td style="width: 50%">{{ $payroll->insurance }}</td>
                </tr>
                <tr>
                    <td class="fw-bold" style="width: 40%">Biaya Asuransi</td>
                    <td class="text-center" style="width: 10%">:</td>
                    <td style="width: 50%">{{ $payroll->insurance_cost }}</td>
                </tr>
                <tr>
                    <td class="fw-bold" style="width: 40%">Pinjaman</td>
                    <td class="text-center" style="width: 10%">:</td>
                    <td style="width: 50%">{{ $payroll->debt }}</td>
                </tr>
                <tr>
                    <td class="fw-bold" style="width: 40%">Pajak Penghasilan (5%)</td>
                    <td class="text-center" style="width: 10%">:</td>
                    <td style="width: 50%">{{ $payroll->tax }}</td>
                </tr>
                <tr>
                    <td class="fw-bold" style="width: 40%">Total Gaji</td>
                    <td class="text-center" style="width: 10%">:</td>
                    <td style="width: 50%">Rp. {{ number_format($payroll->salary) }}</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
