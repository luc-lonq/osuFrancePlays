<x-layout>
    <div class="text-medium dark:text-gray-200 dark:bg-gray-900 rounded-lg mb-20">
        <div class="flex justify-between">
            <h1 class="text-4xl font-semibold dark:text-white mb-4">Score of the week</h1>
            <a href="/sotw">
                <x-button-primary>
                    <svg class="w-5 h-5 mr-2 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                    </svg>
                    Retour
                </x-button-primary>
            </a>
        </div>
        <div class="flex justify-between">
            <h1 class="text-3xl text-gray-800 dark:text-gray-200 mb-4">Statistiques</h1>
            <button id="dropdownDateButton" data-dropdown-toggle="dropdownDate" data-dropdown-placement="bottom" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-3 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Année
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <div id="dropdownDate" class="z-10 hidden bg-white rounded-lg shadow w-30 dark:bg-gray-700">
                <ul class="h-48 py-2 overflow-y-auto text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDateButton">
                    <li>
                        <a href="/sotw/stats" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Tout le temps
                        </a>
                    </li>
                    @foreach($years as $year)
                        <li>
                            <a href="/sotw/stats/{{ $year }}" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                {{ $year }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="flex justify-around mb-6">
            <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-900 p-4 md:p-4 border border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-start w-full">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Scores of the week</h5>
                </div>

                <div class="py-3" id="pie-chart-sotw"></div>
            </div>

            <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-900 p-4 md:p-4 border border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-start w-full">
                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Mentions honorables</h5>
                </div>

                <div class="py-3" id="pie-chart-mh"></div>
            </div>
        </div>


        <div class="flex justify-around space-x-4 items-start">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg shadow-gray-200 dark:shadow-gray-700">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs uppercase text-white bg-gradient-to-br from-purple-600 to-blue-500">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Pseudo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre de SOTW
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($statsSotw as $username => $amount)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $username }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $amount }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg shadow-gray-200 dark:shadow-gray-700">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs uppercase text-white bg-gradient-to-br from-purple-600 to-blue-500">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Pseudo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre de MH
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($statsMh as $username => $amount)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $username }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $amount }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-layout>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>

    const getChartOptions = (chart) => {
        return {
            series: chart['amount'],
            colors: [
                "#FF595E",
                "#FF924C",
                "#FFCA3A",
                "#C5CA30",
                "#8AC926",
                "#36949D",
                "#1982C4",
                "#4267AC",
                "#565AA0",
                "#6A4C93",
                "#000000"
            ],
            chart: {
                height: 350,
                width: "100%",
                type: "pie",
            },
            stroke: {
                colors: ["white"],
                lineCap: "",
            },
            plotOptions: {
                pie: {
                    labels: {
                        show: true,
                    },
                    size: "100%",
                    dataLabels: {
                        offset: -25
                    }
                },
            },
            labels: chart['username'],
            dataLabels: {
                enabled: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            legend: {
                position: "bottom",
                fontFamily: "Inter, sans-serif",
                labels: {
                    colors: "gray"
                }
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        return "x" + value
                    },
                },
            },
            xaxis: {
                labels: {
                    formatter: function (value) {
                        return "x" + value
                    },
                },
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
        }
    }

    if (document.getElementById("pie-chart-sotw") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("pie-chart-sotw"), getChartOptions(@json($chartSotw)));
        chart.render();
    }

    if (document.getElementById("pie-chart-mh") && typeof ApexCharts !== 'undefined') {
        const chart = new ApexCharts(document.getElementById("pie-chart-mh"), getChartOptions(@json($chartMh)));
        chart.render();
    }
</script>
