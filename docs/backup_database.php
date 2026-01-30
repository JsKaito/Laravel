<?php
/**
 * Database Backup Script
 * Genera un archivo SQL con el backup de la base de datos
 */

require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';

use Illuminate\Support\Facades\DB;

$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

try {
    $connection = DB::connection();
    $pdo = $connection->getPdo();
    
    // Obtener todas las tablas
    $tables = $pdo->query('SHOW TABLES')->fetchAll(PDO::FETCH_COLUMN);
    
    $dump = '';
    $dump .= "-- AdminLTE Database Backup\n";
    $dump .= "-- Generated: " . date('Y-m-d H:i:s') . "\n";
    $dump .= "-- Database: adminlte\n";
    $dump .= "-- Tables: " . count($tables) . "\n\n";
    $dump .= "SET FOREIGN_KEY_CHECKS=0;\n\n";
    
    $recordsCount = 0;
    
    // Por cada tabla
    foreach($tables as $table) {
        $dump .= "-- Table: " . $table . "\n";
        
        // Obtener el CREATE TABLE
        $createTable = $pdo->query('SHOW CREATE TABLE `' . $table . '`')->fetch(PDO::FETCH_ASSOC);
        $dump .= $createTable['Create Table'] . ";\n\n";
        
        // Obtener los registros
        $rows = $pdo->query('SELECT * FROM `' . $table . '`')->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($rows) > 0) {
            foreach($rows as $row) {
                $cols = implode(', ', array_map(function($col) { return '`' . $col . '`'; }, array_keys($row)));
                $vals = implode(', ', array_map(function($v) use($pdo) { return $pdo->quote($v); }, array_values($row)));
                $dump .= "INSERT INTO `" . $table . "` (" . $cols . ") VALUES (" . $vals . ");\n";
                $recordsCount++;
            }
        }
        
        $dump .= "\n";
    }
    
    $dump .= "SET FOREIGN_KEY_CHECKS=1;\n";
    
    // Guardar el archivo
    $filename = 'database_backup_' . date('Y-m-d_His') . '.sql';
    file_put_contents($filename, $dump);
    
    echo "\n✅ Backup creado exitosamente!\n";
    echo "📄 Archivo: $filename\n";
    echo "📊 Tablas: " . count($tables) . "\n";
    echo "📝 Registros: " . $recordsCount . "\n";
    echo "\n✨ Detalles:\n";
    
    foreach($tables as $table) {
        $count = $pdo->query('SELECT COUNT(*) as cnt FROM `' . $table . '`')->fetch(PDO::FETCH_ASSOC)['cnt'];
        echo "  • $table: $count registros\n";
    }
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
}
