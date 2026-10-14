website code 


<?php
$start_time = microtime(true);
$memory_usage = round(memory_get_usage() / 1024 / 1024, 2);
$host_header = $_SERVER['HTTP_HOST'] ?? 'Unknown';
$action = $_POST['action'] ?? $_GET['action'] ?? null;

// JSON API endpoint for health checks
if ($action === 'healthz' || isset($_GET['health'])) {
    header('Content-Type: application/json');
    echo json_encode([
        'status' => 'UP',
        'host_by' => 'KUNAL SINGH SENGAR',
        'server' => 'Apache/PHP (Amazon Linux)',
        'port' => 8080,
        'timestamp' => date('c'),
        'memory_mb' => $memory_usage
    ]);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AsyncGate EC2 Control Bench</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif; background: #0f172a; color: #f8fafc; padding: 30px 20px; }
        .container { max-width: 850px; margin: 0 auto; }
        .header { text-align: center; margin-bottom: 25px; }
        .header h1 { font-size: 28px; margin-bottom: 8px; }
        
        /* Host Banner for Kunal Singh Sengar */
        .host-banner {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            border: 1px solid #60a5fa;
            border-radius: 12px;
            padding: 14px 20px;
            text-align: center;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 0.05em;
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
            margin-bottom: 25px;
        }

        .status-badge { display: inline-block; background: rgba(34, 197, 94, 0.15); color: #4ade80; border: 1px solid rgba(34, 197, 94, 0.3); padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: 600; margin-top: 8px; }
        
        .metrics-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; margin-bottom: 30px; }
        .metric-card { background: #1e293b; border: 1px solid #334155; padding: 16px; border-radius: 12px; }
        .metric-card label { display: block; font-size: 11px; text-transform: uppercase; color: #94a3b8; letter-spacing: 0.05em; margin-bottom: 4px; }
        .metric-card span { font-size: 16px; font-weight: 700; color: #e2e8f0; }

        .actions-panel { background: #1e293b; border: 1px solid #334155; padding: 24px; border-radius: 16px; margin-bottom: 30px; }
        .actions-panel h2 { font-size: 18px; margin-bottom: 16px; color: #93c5fd; }
        
        .btn-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px; }
        
        .btn { border: none; padding: 12px 16px; border-radius: 10px; color: white; font-weight: 600; font-size: 14px; cursor: pointer; transition: all 0.2s ease; text-align: left; display: flex; align-items: center; justify-content: space-between; }
        .btn:hover { transform: translateY(-2px); filter: brightness(1.1); }
        .btn:active { transform: translateY(0); }
        
        .btn-blue { background: #2563eb; }
        .btn-purple { background: #7c3aed; }
        .btn-emerald { background: #059669; }
        .btn-amber { background: #d97706; }
        .btn-rose { background: #e11d48; }
        .btn-cyan { background: #0891b2; }

        .output-box { background: #020617; border: 1px solid #1e293b; border-radius: 16px; padding: 20px; font-family: 'Courier New', Courier, monospace; }
        .output-box h3 { font-family: sans-serif; font-size: 14px; color: #64748b; margin-bottom: 12px; text-transform: uppercase; letter-spacing: 0.05em; }
        .console { color: #38bdf8; font-size: 13px; line-height: 1.6; white-space: pre-wrap; word-break: break-all; }
        .footer-info { display: flex; justify-content: space-between; margin-top: 15px; color: #64748b; font-size: 12px; font-family: sans-serif; }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>🚀 AsyncGate EC2 Workbench</h1>
        <div class="status-badge">● Apache Server Running (Port 8080)</div>
    </div>

    <!-- Personal Host Banner -->
    <div class="host-banner">
        ⚡ Hosted & Maintained by KUNAL SINGH SENGAR
    </div>

    <!-- Server Telemetry Header -->
    <div class="metrics-grid">
        <div class="metric-card">
            <label>Proxy Host Header</label>
            <span><?= htmlspecialchars($host_header) ?></span>
        </div>
        <div class="metric-card">
            <label>PHP Base Memory</label>
            <span><?= $memory_usage ?> MB</span>
        </div>
        <div class="metric-card">
            <label>Server Time</label>
            <span><?= date('H:i:s T') ?></span>
        </div>
    </div>

    <!-- Action Buttons Panel -->
    <div class="actions-panel">
        <h2>Execute Server Tasks</h2>
        <form method="POST" action="" class="btn-grid">
            <button type="submit" name="action" value="cpu_spike" class="btn btn-amber">
                ⚡ Simulate CPU Load <span>→</span>
            </button>
            <button type="submit" name="action" value="memory_alloc" class="btn btn-purple">
                📦 Allocate 10MB RAM <span>→</span>
            </button>
            <button type="submit" name="action" value="inspect_headers" class="btn btn-blue">
                🔍 Inspect Envoy Headers <span>→</span>
            </button>
            <button type="submit" name="action" value="simulate_latency" class="btn btn-rose">
                ⏱ Inject 500ms Delay <span>→</span>
            </button>
            <button type="submit" name="action" value="json_telemetry" class="btn btn-emerald">
                📊 Fetch Health JSON <span>→</span>
            </button>
            <button type="submit" name="action" value="generate_log" class="btn btn-cyan">
                📝 Trigger Apache Log <span>→</span>
            </button>
        </form>
    </div>

    <!-- Live Console Output -->
    <div class="output-box">
        <h3>Execution Console</h3>
        <div class="console">
<?php
if ($action) {
    switch ($action) {
        case 'cpu_spike':
            $t0 = microtime(true);
            for ($i = 0; $i < 3000000; $i++) { $x = sqrt($i) * sin($i); }
            $dur = round((microtime(true) - $t0) * 1000, 2);
            echo "[TASK EXECUTION: CPU SPIKE]\n";
            echo "Calculated 3,000,000 floating point operations.\n";
            echo "Task Duration: {$dur} ms\n";
            echo "Status: Success (200 OK)";
            break;

        case 'memory_alloc':
            $dummy = str_repeat('A', 10 * 1024 * 1024);
            $peak = round(memory_get_peak_usage() / 1024 / 1024, 2);
            echo "[TASK EXECUTION: MEMORY ALLOCATION]\n";
            echo "Successfully allocated 10 MB string buffer in RAM.\n";
            echo "Peak PHP Memory Usage: {$peak} MB\n";
            echo "Status: Success (200 OK)";
            unset($dummy);
            break;

        case 'inspect_headers':
            echo "[TASK EXECUTION: INCOMING REQUEST HEADERS]\n";
            echo "Inspecting HTTP headers attached by Envoy Proxy:\n\n";
            foreach (getallheaders() as $name => $value) {
                echo sprintf("%-25s : %s\n", $name, $value);
            }
            break;

        case 'simulate_latency':
            $t0 = microtime(true);
            usleep(500000); // 500 ms
            $dur = round((microtime(true) - $t0) * 1000, 2);
            echo "[TASK EXECUTION: LATENCY TEST]\n";
            echo "Execution paused for thread sleep.\n";
            echo "Measured Latency: {$dur} ms\n";
            echo "Status: Success (200 OK)";
            break;

        case 'json_telemetry':
            echo "[TASK EXECUTION: HEALTH JSON PREVIEW]\n";
            echo json_encode([
                'status' => 'HEALTHY',
                'hosted_by' => 'KUNAL SINGH SENGAR',
                'backend' => 'Apache/2.4',
                'node_ip' => $_SERVER['SERVER_ADDR'] ?? '127.0.0.1',
                'uptime_check' => 'PASSED'
            ], JSON_PRETTY_PRINT);
            break;

        case 'generate_log':
            error_log("[AsyncGate Test Log] Custom action triggered by Kunal Singh Sengar at " . date('Y-m-d H:i:s'));
            echo "[TASK EXECUTION: APACHE LOG TRIGGER]\n";
            echo "Written log entry to system error log.\n";
            echo "Location: /var/log/httpd/error_log\n";
            echo "Status: Success (200 OK)";
            break;

        default:
            echo "Unknown action.";
    }
    $exec_time = round((microtime(true) - $start_time) * 1000, 2);
    echo "\n\n[System Response Time: {$exec_time} ms]";
} else {
    echo "Ready. Click any button above to trigger an active server task.";
}
?>
        </div>
        <div class="footer-info">
            <span>Server: EC2 Amazon Linux | Port: 8080</span>
            <span>Host Owner: <strong>KUNAL SINGH SENGAR</strong></span>
        </div>
    </div>
</div>

</body>
</html>