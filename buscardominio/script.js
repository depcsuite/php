document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("searchButton").addEventListener("click", function () {
        const domain = document.getElementById("domainInput").value;

        // Clear previous results
        document.getElementById("results").innerHTML = "";

        // Fetch domain data
        fetch("getDomainInfo.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "domain=" + encodeURIComponent(domain)
        })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    document.getElementById("results").innerHTML = `<p>Error: ${data.error}</p>`;
                } else {
                    // Display the domain data
                    document.getElementById("results").innerHTML = `
                    <p>Domain: ${data.domain}</p>
                    <p>Created: ${data.created}</p>
                    <p>Updated: ${data.updated}</p>
                    <p>Expiration: ${data.expiration}</p>
                    <p>Registrar: ${data.registrar}</p>
                    <p>Name Servers: ${data.nameServers.join(", ")}</p>`;
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });
});
