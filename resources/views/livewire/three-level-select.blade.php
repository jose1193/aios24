<div>
    <label for="province">Provincia:</label>
    <select wire:model="provinceId" id="province">
        <option value="">Selecciona una provincia</option>
        @foreach ($provinces as $province)
            <option value="{{ $province->id }}">{{ $province->name }}</option>
        @endforeach
    </select>
</div>

@if ($provinceId)
    <div>
        <label for="communityProvince">Comunidad:</label>
        <select wire:model="communityProvinceId" id="communityProvince">
            <option value="">Selecciona una comunidad</option>
            @foreach ($communityProvinces as $communityProvince)
                <option value="{{ $communityProvince->id }}">{{ $communityProvince->description }}</option>
            @endforeach
        </select>
    </div>
@endif

@if ($communityProvinceId)
    <div>
        <label for="city">Ciudad:</label>
        <select wire:model="cityId" id="city">
            <option value="">Selecciona una ciudad</option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>
    </div>
@endif
