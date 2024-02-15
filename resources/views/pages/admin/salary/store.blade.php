@extends('layouts.admin')

@section('content')

<h1 class="fw-bold fs-3">Bayar Gaji</h1>

<div class="w-100 p-4 bg-white rounded-3 mt-5 shadow">
    <form action="{{ route('gaji.store', $employee->id) }}" method="POST" class="d-flex flex-row gap-4 ">
        <div class="w-50">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Karyawan</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $employee->name) }}">
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Gaji Pokok (Rp.)</label>
                <input type="text" class="form-control" id="basic_salary" name="basic_salary"
                    value="{{ old('basic_salary', $employee->totalSalary($employee->totalAttendanceDays($employee->id)))  }}">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Asuransi</label>
                <select class="form-select" aria-label="Default select example" id="insurance" name="insurance" value>
                    <option selected>Pilih Asuransi</option>

                    @foreach ($insurances as $insurance)
                    <option value="{{ $insurance->id }}" data-cost="{{ $insurance->cost }}">{{ $insurance->name }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="w-50">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Jabatan - Divisi</label>
                <input type="text" class="form-control" id="name" name="position" value="{{ old('position',
                    $employee->position->name. ' - ' . $employee->position->division->name) }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Pajak Penghasilan (5%) - (Rp.)</label>
                <input type="nuumber" class="form-control" id="tax" name="tax"
                    value="{{ old('tax', $employee->totalSalary($employee->totalAttendanceDays($employee->id) * 0.05)) }}">
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Pinjaman</label>
                <input type="number" class="form-control" id="debt" name="debt" value="0">
            </div>
            <div class="mb-3">
                <p>Total Gaji</p>
                <h4 id="salary" class="text-danger fw-bold">Rp. 0</h4>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Simpan dan Bayar</button>
            </div>
        </div>
    </form>
</div>

<script>
    let salary = document.querySelector('#salary');
    let basic_salary = document.querySelector('#basic_salary');
    let tax = document.querySelector('#tax');
    let debt = document.querySelector('#debt');
    let insurance = document.querySelector('#insurance');

    basic_salary.addEventListener('change', calculate)
    tax.addEventListener('change', calculate)
    debt.addEventListener('change', calculate)
    insurance.addEventListener('change', calculate)

    function calculate() {
        let getBasicSalary = basic_salary.value
        let getTax = tax.value
        let getDebt = debt.value
        let cost = insurance.options[insurance.selectedIndex].dataset.cost

        let calculateSalary = getBasicSalary - cost - getTax - getDebt;
        salary.innerHTML = calculateSalary
    }
</script>

@endsection