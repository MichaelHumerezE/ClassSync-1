@csrf
<div class="row">
    <div class="col-12">
        <div class="form-floating">
            <input type="text" placeholder="name" class="form-control" name="name"
                value="{{ isset($diagrama) ? $diagrama->name : old('name') }}">
            <label>Nombre</label>
        </div>
    </div>
</div>
