<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'vendor/autoload.php';


use Iodev\Whois\Factory;


header("Content-Type: application/json");


function extractUpdatedDate($rawData)
{
    $updatedDatePatterns = [
        '/(?:Updated Date|Last Updated On|changed):?\s*([\d\-]+)/i',
        '/(?:Domain last updated):?\s*([\d\-]+)/i',
    ];

    foreach ($updatedDatePatterns as $pattern) {
        if (preg_match($pattern, $rawData, $matches)) {
            return $matches[1];
        }
    }

    return null;
}
function getDomainInfo($domain)
{
    $whois = Factory::get()->createWhois();

    try {
        $result = $whois->loadDomainInfo($domain);

        if ($result) {
           // $rawData = $whois->loadData($domain)->getText();
            $updatedDate = "";//extractUpdatedDate($rawData);
            $registrar = $result->getRegistrar();
            //$registrarName = $registrar ? $registrar->getName() : 'N/A';
            $registrarName = "";//$registrarName ?? 'N/A';

            return [
                'domain' => $result->getDomainName(),
                'created' => $result->getCreationDate(),
                'updated' => $updatedDate,
                'expiration' => $result->getExpirationDate(),
                'registrar' => $registrarName,
                'nameServers' => $result->getNameServers(),
                // Add other data fields as needed
            ];
        } else {
            return ['error' => 'El dominio no está registrado.'];
        }
    } catch (\Exception$e) {
        return ['error' => $e->getMessage()];
    }
}

if (isset($_POST["domain"])) {
    $domain = $_POST["domain"];
    $domainInfo = getDomainInfo($domain);
    echo json_encode($domainInfo);
} else {
    echo json_encode(["error" => "Dominio no proporcionado."]);
}
