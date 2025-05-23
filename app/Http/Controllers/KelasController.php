<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class KelasController extends Controller
{
    protected $client;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = 'http://localhost:8080';
    }

    public function index()
    {
        try {
            $response = $this->client->get("{$this->baseUrl}/kelas");
            $data = json_decode($response->getBody(), true);

            return view('admin.kelas.index', ['kelas' => $data]);
        } catch (RequestException $e) {
            return back()->with('error', 'Failed to fetch data: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kelas' => 'required|string',
            'nama_kelas' => 'required|string'
        ]);

        try {
            $this->client->post("{$this->baseUrl}/kelas", [
                'form_params' => $request->only(['kode_kelas', 'nama_kelas']),
            ]);

            return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan');
        } catch (RequestException $e) {
            return back()->with('error', 'Failed to add data: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($kode_kelas)
    {
        try {
            $response = $this->client->get("{$this->baseUrl}/kelas/{$kode_kelas}");
            $data = json_decode($response->getBody(), true);

            return view('admin.kelas.edit', ['kelas' => $data]);
        } catch (RequestException $e) {
            return back()->with('error', 'Failed to fetch data: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $kode_kelas)
    {
        $request->validate([
            'kode_kelas' => 'required|string',
            'nama_kelas' => 'required|string'
        ]);

        try {
            $this->client->put("{$this->baseUrl}/kelas/{$kode_kelas}", [
                'json' => $request->only(['kode_kelas', 'nama_kelas']),
            ]);

            return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui');
        } catch (RequestException $e) {
            return back()->with('error', 'Failed to update data: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->client->delete("{$this->baseUrl}/kelas/{$id}");

            return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus');
        } catch (RequestException $e) {
            return back()->with('error', 'Failed to delete data: ' . $e->getMessage());
        }
    }
}
