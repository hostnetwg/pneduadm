<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Pobierz wszystkie dane z tabeli products
        $products = Product::all(); // Pobranie wszystkich rekordów z tabeli "products" jako kolekcji

        // Przekaż dane do widoku
        return view('products.index', ['products' => $products]); // Przekazanie danych do widoku "products.index" w formie tablicy asocjacyjnej
    }

    public function create()
    {
        // Wyświetl formularz do dodawania produktu
        return view('products.create'); // Wywołanie widoku odpowiedzialnego za formularz dodawania nowego produktu 
    }

    public function store(Request $request)
    {
        // Walidacja danych wejściowych
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Pole "name" jest wymagane, musi być łańcuchem tekstowym i nie może przekraczać 255 znaków
            'price' => 'required|numeric|min:0', // Pole "price" jest wymagane, musi być liczbą i nie może być mniejsze niż 0
            'description' => 'required|string|max:255', // Pole "quantity" jest wymagane, musi być liczbą całkowitą i nie może być mniejsze niż 0
        ]);

        // Dodanie nowego produktu
        Product::create($validatedData); // Utworzenie nowego rekordu w tabeli "products" z wykorzystaniem zwalidowanych danych

        // Przekierowanie z komunikatem sukcesu
        return redirect()->route('products.index')->with('success', 'Produkt został dodany.'); // Przekierowanie do listy produktów z informacją o sukcesie
    }
    
    // Usuwanie produktu
    public function destroy($id)
    {
        // Znajdź produkt po ID
        $product = Product::findOrFail($id);

        // Usuń produkt z bazy danych
        $product->delete();

        // Przekieruj z komunikatem sukcesu
        return redirect()->route('products.index')->with('success', 'Produkt został usunięty.');
    }    
}
