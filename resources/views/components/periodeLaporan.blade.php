<div class="d-flex justify-content-around align-items-center text-center">
    @if($tanggalMulai == 0 && $tanggalSelesai == 0)<h5>Periode: Semua</h5>
    @else <h5>Periode: {{$tanggalMulai}} - {{$tanggalSelesai}}</h5>
    @endif
</div>