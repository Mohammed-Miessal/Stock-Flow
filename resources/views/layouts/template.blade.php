<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" class="sf-js-enabled theme-dark" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EcoStock</title>

    <!--===============  CSS ===============-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}" />

    <!--===============  Icons ===============-->
     <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('assets/js/init-alpine.js') }}"></script>

    <!--===============  Chart.js ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('assets/js/charts-pie.js') }}" defer></script>

    <!--=============== REMIXICONS ICONS ===============-->
    <link rel="stylesheet" href="{{ asset('assets/icons/fonts/remixicon.css') }}">

    <!--===============  select ===============-->
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>


    <!--===============  While i print the order and invoice ===============-->
    <style>
        @media print {
            #printButton {
                display: none;
            }

            #header {
                display: none;
            }

            #aside {
                display: none;
            }

            @page {
                margin: 0;
            }
        }
    </style>
</head>

<body>

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            new TomSelect("#select-product", {
                maxItems: 1,
                create: false, // Pour empêcher l'ajout d'options personnalisées
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });
        });

        $(document).ready(function() {
            new TomSelect("#customer-name", {
                maxItems: 1,
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });
        });

        $(document).ready(function() {
            new TomSelect("#permission_id", {
                maxItems: 5,
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });
        });

        $(document).ready(function() {
            new TomSelect("#role_id", {
                maxItems: 2,
                sortField: {
                    field: "text",
                    direction: "asc"
                }
            });
        });
    </script>
</body>

</html>
