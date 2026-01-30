<?php
/**
 * Testing Script - Pruebas Automatizadas del Sistema
 * Verifica la integridad de datos y funcionalidad de la aplicación
 */

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

use Illuminate\Support\Facades\DB;
use App\Models\Clientes;
use App\Models\producto;
use App\Models\Categoria;
use App\Models\Orden;
use App\Models\Proveedor;

$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Colores para output
$green = "\033[92m";
$red = "\033[91m";
$yellow = "\033[93m";
$blue = "\033[94m";
$reset = "\033[0m";

$totalTests = 0;
$passedTests = 0;

function testCase($name, $condition, &$total, &$passed) {
    global $green, $red, $reset, $yellow;
    $total++;
    if ($condition) {
        echo $green . "✅ PASS: " . $reset . $name . "\n";
        $passed++;
        return true;
    } else {
        echo $red . "❌ FAIL: " . $reset . $name . "\n";
        return false;
    }
}

echo "\n";
echo $blue . "═══════════════════════════════════════════════════════════════\n";
echo "  🧪 TESTING SUITE - AdminLTE Sistema de Gestión\n";
echo "═══════════════════════════════════════════════════════════════\n" . $reset;

// TEST 1: Verificar tablas creadas
echo "\n" . $yellow . "📋 Test de Tablas\n" . $reset;
$tables = DB::select('SHOW TABLES');
testCase("Tablas creadas correctamente", count($tables) >= 8, $totalTests, $passedTests);

// TEST 2: Clientes
echo "\n" . $yellow . "👥 Test de Clientes\n" . $reset;
$clientesCount = Clientes::count();
testCase("Clientes registrados: $clientesCount", $clientesCount >= 5, $totalTests, $passedTests);
testCase("Email único en clientes", Clientes::count() === Clientes::distinct()->count('email'), $totalTests, $passedTests);
testCase("Primer cliente tiene nombre", !empty(Clientes::first()?->nombre), $totalTests, $passedTests);

$cliente = Clientes::first();
testCase("Cliente tiene datos de contacto", !empty($cliente->telefono) || !empty($cliente->ciudad), $totalTests, $passedTests);

// TEST 3: Productos
echo "\n" . $yellow . "🛍️ Test de Productos\n" . $reset;
$productosCount = producto::count();
testCase("Productos registrados: $productosCount", $productosCount >= 5, $totalTests, $passedTests);
testCase("Todos los productos tienen precio", producto::where('precio', '<=', 0)->count() === 0, $totalTests, $passedTests);
testCase("Stock es número no negativo", producto::where('stock', '<', 0)->count() === 0, $totalTests, $passedTests);

$producto = producto::first();
testCase("Producto tiene descripción", !empty($producto->descripcion), $totalTests, $passedTests);

// TEST 4: Categorías
echo "\n" . $yellow . "🏷️ Test de Categorías\n" . $reset;
$categoriasCount = Categoria::count();
testCase("Categorías registradas: $categoriasCount", $categoriasCount >= 3, $totalTests, $passedTests);
testCase("Nombres de categoría son únicos", Categoria::count() === Categoria::distinct()->count('nombre'), $totalTests, $passedTests);

// TEST 5: Órdenes
echo "\n" . $yellow . "📋 Test de Órdenes\n" . $reset;
$ordenesCount = Orden::count();
testCase("Órdenes registradas: $ordenesCount", $ordenesCount >= 3, $totalTests, $passedTests);

$orden = Orden::first();
testCase("Orden tiene cliente válido", $orden && !empty($orden->cliente_id) && $orden->cliente !== null, $totalTests, $passedTests);
testCase("Número de orden es único", Orden::count() === Orden::distinct()->count('numero_orden'), $totalTests, $passedTests);

$estadosValidos = ['pendiente', 'procesando', 'completada', 'cancelada'];
$estadoInvalido = Orden::whereNotIn('estado', $estadosValidos)->count();
testCase("Estados de orden son válidos", $estadoInvalido === 0, $totalTests, $passedTests);

// TEST 6: Proveedores
echo "\n" . $yellow . "🏢 Test de Proveedores\n" . $reset;
$proveedoresCount = Proveedor::count();
testCase("Proveedores registrados: $proveedoresCount", $proveedoresCount >= 3, $totalTests, $passedTests);
testCase("Emails de proveedores son únicos", Proveedor::count() === Proveedor::distinct()->count('email'), $totalTests, $passedTests);

// TEST 7: Relaciones
echo "\n" . $yellow . "🔗 Test de Relaciones\n" . $reset;

$ordenConCliente = Orden::with('cliente')->first();
testCase("Orden tiene relación con Cliente", $ordenConCliente && $ordenConCliente->cliente !== null, $totalTests, $passedTests);

// TEST 8: Integridad Referencial
echo "\n" . $yellow . "🛡️ Test de Integridad Referencial\n" . $reset;

$clientesOrfanos = Orden::whereNull('cliente_id')->count();
testCase("No hay órdenes sin cliente", $clientesOrfanos === 0, $totalTests, $passedTests);

// TEST 9: Datos de Prueba
echo "\n" . $yellow . "📊 Test de Datos de Prueba\n" . $reset;

$juan = Clientes::where('nombre', 'like', '%Juan%')->first();
testCase("Cliente Juan García existe", $juan !== null, $totalTests, $passedTests);

$laptop = producto::where('nombre', 'like', '%Laptop%')->first();
testCase("Producto Laptop existe", $laptop !== null, $totalTests, $passedTests);

$electronica = Categoria::where('nombre', 'Electrónica')->first();
testCase("Categoría Electrónica existe", $electronica !== null, $totalTests, $passedTests);

// TEST 10: Conteos Específicos
echo "\n" . $yellow . "📈 Test de Conteos Verificados\n" . $reset;

testCase("Exactamente 5 categorías", Categoria::count() === 5, $totalTests, $passedTests);
testCase("Exactamente 10 productos", producto::count() === 10, $totalTests, $passedTests);
testCase("Entre 5-7 órdenes", Orden::count() >= 5 && Orden::count() <= 7, $totalTests, $passedTests);
testCase("Entre 5-7 clientes", Clientes::count() >= 5 && Clientes::count() <= 7, $totalTests, $passedTests);
testCase("Exactamente 5 proveedores", Proveedor::count() === 5, $totalTests, $passedTests);

// TEST 11: Validación de Timestamps
echo "\n" . $yellow . "⏰ Test de Timestamps\n" . $reset;

$clienteConTimestamp = Clientes::first();
testCase("Clientes tienen created_at", $clienteConTimestamp && $clienteConTimestamp->created_at !== null, $totalTests, $passedTests);
testCase("Clientes tienen updated_at", $clienteConTimestamp && $clienteConTimestamp->updated_at !== null, $totalTests, $passedTests);

// TEST 12: Búsquedas y Filtros
echo "\n" . $yellow . "🔍 Test de Búsquedas\n" . $reset;

$busquedaProducto = producto::where('nombre', 'like', '%iPhone%')->first();
testCase("Búsqueda de productos por nombre funciona", $busquedaProducto !== null, $totalTests, $passedTests);

$busquedaCliente = Clientes::where('ciudad', 'Madrid')->first();
testCase("Búsqueda de clientes por ciudad funciona", $busquedaCliente !== null, $totalTests, $passedTests);

// Resumen Final
echo "\n";
echo $blue . "═══════════════════════════════════════════════════════════════\n";
echo "  📊 RESULTADOS DE PRUEBAS\n";
echo "═══════════════════════════════════════════════════════════════\n" . $reset;

$percentage = ($passedTests / $totalTests) * 100;
$statusColor = $percentage === 100 ? $green : ($percentage >= 80 ? $yellow : $red);

echo "Total de Pruebas: $totalTests\n";
echo $green . "Pruebas Exitosas: $passedTests\n" . $reset;
echo $red . "Pruebas Fallidas: " . ($totalTests - $passedTests) . "\n" . $reset;
echo $statusColor . "Porcentaje de Éxito: " . number_format($percentage, 2) . "%\n" . $reset;

if ($percentage === 100) {
    echo "\n" . $green . "✨ ¡TODAS LAS PRUEBAS PASARON EXITOSAMENTE! ✨\n" . $reset;
    echo "El sistema está funcionando perfectamente.\n";
} else if ($percentage >= 80) {
    echo "\n" . $yellow . "⚠️  La mayoría de pruebas pasaron, pero hay algunos errores.\n" . $reset;
} else {
    echo "\n" . $red . "❌ Hay problemas significativos en el sistema.\n" . $reset;
}

echo "\n";
