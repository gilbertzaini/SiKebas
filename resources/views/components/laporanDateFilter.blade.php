<div class="col-5 justify-content-center align-self-center">
      <label for="tanggalMulai" class="form-label second-text">Periode: </label>
      <input type="date" name="tanggalMulai" @if($tanggalMulai !=NULL) value="{{$tanggalMulai}}" @endif />
    </div>

    <div class="col-5 justify-content-center align-self-center">
      <label for="tanggalSelesai" class="form-label second-text">Sampai: </label>
      <input type="date" name="tanggalSelesai" @if($tanggalSelesai !=NULL) value="{{ $tanggalSelesai }}" @endif />
    </div>

    <div class="col-2 container d-flex justify-content-center align-items-center pt-3">
      <button type="submit" class="btn btn-primary col-5">Pilih</button>
    </div>