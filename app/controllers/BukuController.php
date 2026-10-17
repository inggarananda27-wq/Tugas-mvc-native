<?php
class BukuController
{
    private $model;
    public function __construct(BukuModel $model)
    {
        $this->model = $model;
    }
    public function index(): void
    {
        $buku = $this->model->getAll();
        require __DIR__ . '/../views/buku/index.php';
    }
    public function create(): void
    {
        require __DIR__ . '/../views/buku/create.php';
    }
    public function store(): void
    {
        $data = $this->validateInput($_POST);
        $this->model->insert($data);
        header('Location: index.php?page=buku');
        exit;
    }
    public function edit(): void
    {
        $id = (int) ($_GET['id'] ?? 0);
        $buku = $this->model->findById($id);
        if (!$buku) {
            http_response_code(404);
            exit('Data buku tidak ditemukan.');
        }
        require __DIR__ . '/../views/buku/edit.php';
    }
    public function update(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        $data = $this->validateInput($_POST);
        $this->model->update($id, $data);
        header('Location: index.php?page=buku');
        exit;
    }
    public function delete(): void
    {
        $id = (int) ($_POST['id'] ?? 0);
        $this->model->delete($id);
        header('Location: index.php?page=buku');
        exit;
    }
    private function validateInput(array $input): array
    {
        $data = [
            'judul'        => trim($input['judul'] ?? ''),
            'tahun_terbit' => (int) ($input['tahun_terbit'] ?? 0),
            'genre'        => trim($input['genre'] ?? ''),
            'penulis'      => trim($input['penulis'] ?? '')
        ];

        if ($data['judul'] === '' || $data['tahun_terbit'] <= 0 || $data['genre'] === '' || $data['penulis'] === '') {
            exit('Judul, tahun terbit, genre, dan penulis wajib diisi dengan benar.');
        }

        return $data;
    }
}
?>