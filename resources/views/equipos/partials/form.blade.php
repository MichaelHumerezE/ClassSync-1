@csrf
<div class="row">
    <div class="col-12">
        <br>
        <label>Elegir un Usuario</label>
        <select name="id_usuario" class="form-control">
            <option value=""> Seleccione Un Usuario... </option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        <br>
    </div>
        <input type="hidden" placeholder="id_diagrama" class="form-control" name="id_diagrama" value="{{ $diagrama->id }}">
</div>
