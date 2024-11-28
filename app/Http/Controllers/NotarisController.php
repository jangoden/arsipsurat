<?php

namespace App\Http\Controllers;

use App\Imports\NotarisImport;
use App\Models\Notaris;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NotarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $search = $request->search;
        $sort = $request->get('sort', 'id');
        $order = $request->get('order', 'asc');

        $data = Notaris::render($search, $sort, $order);

        return view('pages.notaris.index', [
            'data' => $data,
            'search' => $search,
            'sort' => $sort,
            'order' => $order,
        ]);
    }

    public function create(): View
    {
        return view('pages.notaris.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nota_number' => 'required|string|max:255',
            'nota_date' => 'required|date',
            'description' => 'required|string',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
        ]);

        Notaris::create($validated);

        return redirect()
            ->route('notaris.index')
            ->with('success', 'Notaris berhasil ditambahkan.');
    }
    public function show($id): View
    {
        $notaris = Notaris::find($id);
        return view('pages.notaris.show', ['data' => $notaris]);
    }

    public function edit($id): View
    {
        $notaris = Notaris::find($id);
        return view('pages.notaris.edit',
         ['data' => $notaris]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'no_nota_dinas' => 'required|string|max:255',
            'tgl_nota_dinas' => 'required|date',
            'perihal' => 'required|string|max:255',
            'dari' => 'required|string|max:255',
            'kepada' => 'required|string|max:255',
        ]);

        $notaris = Notaris::find($id);
        $notaris->update($validated);
        return redirect()
            ->route('notaris.index')
            ->with('success', 'Notaris berhasil diperbarui.');
    }
    public function destroy($id): RedirectResponse
    {
        $notaris = Notaris::find($id);
        $notaris->delete();

        return redirect()
            ->route('notaris.index')
            ->with('success', 'Notaris berhasil dihapus.');
    }

    public function import(Request $request): RedirectResponse
    {
        $request->validate([
            'excel' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('excel');

        Excel::import(new NotarisImport, $file);

        return redirect()
            ->route('notaris.index')
            ->with('success', 'Notaris berhasil diimport.');
    }
}
