<div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Import Data Notaris</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('notaris.import') }}" method="POST" enctype="multipart/form-data">
                @csrf <!-- Tambahkan CSRF token untuk keamanan -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-6">
                            <label for="excel" class="form-label">File Excel</label>
                            <input type="file" id="excel" name="excel" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- Ubah type menjadi submit agar form bisa dikirim -->
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
