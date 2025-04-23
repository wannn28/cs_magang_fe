@extends('layouts.app')

@section('content')
    <div>
        <div class="text-xl flex w-full justify-center font-bold">Peringkat Penerimaan</div>
        <div class="w-full justify-center font-medium flex text-[12px] text-[#757575]">Berikut adalah tabel biaya untuk kategori reguler</div>
    </div>
    <div>
        <table class="w-full border-collapse border border-gray-400 text-xs font-normal text-center">
            <thead class="h-8">
              <tr>
                
                <th class="border border-gray-300 text-xs font-normal">No</th>
                <th class="border border-gray-300 text-xs font-normal">Nama Siswa</th>
                <th class="border border-gray-300 text-xs font-normal">Uang Wakaf</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="border border-gray-300 text-xs font-normal">1</td>
                <td class="border border-gray-300 text-xs font-normal">Indianapolis</td>
                <td class="border border-gray-300 text-xs font-normal">Indianapolis</td>
              </tr>
              <tr>
                <td class="border border-gray-300 text-xs font-normal">2</td>
                <td class="border border-gray-300 text-xs font-normal">Columbus</td>
                <td class="border border-gray-300 text-xs font-normal">Columbus</td>
              </tr>
              <tr>
                <td class="border border-gray-300 text-xs font-normal">3</td>
                <td class="border border-gray-300 text-xs font-normal">Detroit</td>
                <td class="border border-gray-300 text-xs font-normal">Detroit</td>
              </tr>
            </tbody>
          </table>
    </div>
    </div>
@endsection
