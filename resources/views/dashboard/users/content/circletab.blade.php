<div class="py-1 px-4 pb-3 border-bottom border-2 d-flex justify-content-between align-items-center">
    <span class="fw-semibold">List of Circle</span>
    <button class="btn btn-sm btn-primary rounded-3 text-white" data-bs-toggle="modal" data-bs-target="#modalAddCircle">Add Circle</button>
</div>
<div class="">
    <div class="filter-row "></div>
    <div class="table-responsive mt-2">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th class="py-2 fw-semibold ps-md-4 border-0" scope="col" style="width: 12px;">
                        <input class="form-check-input kj-input-checkbox" type="checkbox" value="" id="cbCheckAllCircle" />
                    </th>
                    <th class="py-2 fw-semibold border-0" scope="col">Kode</th>
                    <th class="py-2 fw-semibold border-0" scope="col">Nama</th>
                    <th class="py-2 fw-semibold border-0" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($circles as $circle)
                    <tr class="">
                        <td class="ps-md-4 align-middle" scope="row">
                            <input class="form-check-input cb-row-circle kj-input-checkbox" name="cb-row-circle" type="checkbox" value="{{ $circle->kode }}" id="{{ $circle->nama }}" />
                        </td>
                        <td class="align-middle">{{ $circle->kode }}</td>
                        <td class="align-middle">{{ $circle->nama }}</td>
                        <td class="align-middle d-flex align-items-center">
                            <a href="{{ route('dashboard.edit.circle', $circle->id) }}" class="text-decoration-none">
                                <i class="bi bi-pencil-square fs-4 text-warning"></i>
                            </a>
                            <form action="{{ route('dashboard.delete.circle', $circle->id) }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn"
                                onclick= "return confirm('Apakah anda ingin menghapusnya?'); event.preventDefault(); document.getElementById('delete-user-form-{{ $circle->id }}').submit();" >
                                    <i class="bi bi-trash fs-4 text-danger"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
