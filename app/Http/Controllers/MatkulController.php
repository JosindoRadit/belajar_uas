<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class matkulController extends Controller
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
            $response = $this->client->get("{$this->baseUrl}/matkul");
            $data = json_decode($response->getBody(), true);
            

            return view('admin.matkul.index', ['matkul' => $data]);
        } catch (RequestException $e) {
            return back()->with('error', 'Failed to fetch data: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('admin.matkul.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matkul' => 'required|string',
            'nama_matkul' => 'required|string',
            'sks' => 'required|string'
        ]);

        try {
            $this->client->post("{$this->baseUrl}/matkul", [
                'form_params' => $request->only(['kode_matkul', 'nama_matkul', 'sks']),
            ]);

            return redirect()->route('matkul.index')->with('success', 'matkul berhasil ditambahkan');
        } catch (RequestException $e) {
            return back()->with('error', 'Failed to add data: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($kode_matkul)
    {
        try {
            $response = $this->client->get("{$this->baseUrl}/matkul/{$kode_matkul}");
            $data = json_decode($response->getBody(), true);

            return view('admin.matkul.edit', ['matkul' => $data]);
        } catch (RequestException $e) {
            return back()->with('error', 'Failed to fetch data: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $kode_matkul)
    {
        $request->validate([
            'kode_matkul' => 'required|string',
            'nama_matkul' => 'required|string',
            'sks' => 'required|string'
        ]);

        try {
            $this->client->put("{$this->baseUrl}/matkul/{$kode_matkul}", [
                'json' => $request->only(['kode_matkul', 'nama_matkul', 'sks']),
            ]);

            return redirect()->route('matkul.index')->with('success', 'matkul berhasil diperbarui');
        } catch (RequestException $e) {
            return back()->with('error', 'Failed to update data: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $this->client->delete("{$this->baseUrl}/matkul/{$id}");

            return redirect()->route('matkul.index')->with('success', 'matkul berhasil dihapus');
        } catch (RequestException $e) {
            return back()->with('error', 'Failed to delete data: ' . $e->getMessage());
        }
    }
}
