<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><%= lessonTitle %></title>
<meta name="author" content="UCAR/COMET">
<meta name="dcterms.rightsHolder" content="UCAR/COMET">
<meta name="robots" content="all">
<meta name="Description" content="<%= lessonDesc %>">
<meta name="keywords" content="<%= lessonKeys %>">
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="initial-scale=1.0">
<link rel="stylesheet" href="src/css/legacy_styles.css">
<link rel="stylesheet" href="src/css/layout.css">
<link rel="stylesheet" href="src/css/core.css">
<script src="src/js/jquery.min.js"></script>
<script src="src/js/jquery-ui.min.js"></script>
<script src="src/js/jquery-plugins.min.js"></script>
<script src="src/js/defaults.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>
<body>
    <!-- navbar-->
    <nav class="sticky top-0 z-50 w-full h-16 border-b backdrop-filter backdrop-blur-xl bg-opacity-5 md:px-4 px-2">
        <div class="mx-auto flex h-full items-center justify-between p-1 sm:p-3 md:gap-2">
            <div class="flex items-center gap-5">
                <button id="menu-button" class="items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 hover:bg-accent hover:text-accent-foreground h-9 w-9 md:hidden flex"
                    type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="radix-:Raqj6:"
                    data-state="closed">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-align-left">
                        <line x1="21" x2="3" y1="6" y2="6"></line>
                        <line x1="15" x2="3" y1="12" y2="12"></line>
                        <line x1="17" x2="3" y1="18" y2="18"></line>
                    </svg>
                </button>
                <div class="flex items-center gap-6">
                    <div class="hidden md:flex">
                        <a class="flex items-center gap-2.5" href="index.htm">
                            <h1 class="text-md font-semibold">$templateTitle</h1>
                        </a>
                    </div>
                    <div class="hidden md:flex items-center gap-5 text-sm font-medium text-muted-foreground">
                        <!-- additional links -->
                    </div>
                </div>
            </div>
            <div class="flex sm:ml-0 gap-2">
                <a
                    href="$printLink"
                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 w-9"
                    aria-label="Print" title="Print"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-printer w-[1.1rem] h-[1.1rem]">
                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                        <path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6"></path>
                        <rect x="6" y="14" width="12" height="8" rx="1"></rect>
                    </svg>
                </a>
                <a
                    href="download.php"
                    class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-9 w-9"
                    aria-label="Download" title="Download"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-download w-[1.1rem] h-[1.1rem]">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                        <polyline points="7 10 12 15 17 10"></polyline>
                        <line x1="12" x2="12" y1="15" y2="3"></line>
                    </svg>
                </a>
            </div>
        </div>
    </nav>
    <!-- main content -->
    <main class="px-5 sm:px-8 h-auto">
        <div class="flex items-start gap-14">
            <!-- desktop toc sidebar -->
            <aside class="md:flex hidden flex-[1] min-w-[230px] sticky top-16 flex-col h-[94.5vh] overflow-y-auto">
                <div dir="ltr" class="relative overflow-hidden py-4"
                    style="position: relative; --radix-scroll-area-corner-width: 0px; --radix-scroll-area-corner-height: 0px;">
                    <div data-radix-scroll-area-viewport="" class="h-full w-full rounded-[inherit]"
                        style="overflow: hidden scroll;">
                        <div style="min-width: 100%; display: table;">
                            <div class="flex flex-col gap-3.5 mt-5 pb-6">
                                <div class="mb-2">
                                    <h2 class="text-sm font-bold mb-2">$TOC_MENU</h2>
                                    $templateMenu
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- page content -->
            <div class="flex-1 md:flex-[6]">
                <div class="flex items-start gap-14">
                    <div class="flex-[3] pt-10">
                        <!-- breadcrumbs here-->
                        <div class="typography">
                            
                        $templateContent

                        </div>
                    </div>
                    <div class="hidden xl:flex xl:flex-col sticky top-16 gap-3 py-8 min-w-[230px] h-[94.5vh] toc">
                        <button
                            class="flex items-center ml-2 transition opacity-0 mt-6 self-start text-sm text-neutral-800 dark:text-neutral-300/85"><svg
                                stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="inline-block w-4 h-4 mr-1 align-middle" height="1em" width="1em"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="m5 12 7-7 7 7"></path>
                                <path d="M12 19V5"></path>
                            </svg><span>Scroll to top</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="w-full h-16 border-t">
        <div
            class="flex flex-wrap items-center justify-center sm:justify-between gap-4 sm:gap-0 w-full h-full px-2 sm:py-0 py-3 sm:px-4 lg:px-8 text-sm text-muted-foreground">
            <p class="text-center">©  <%= copyrightYear %>, <a class="font-semibold" href="https://www.meted.ucar.edu/">COMET MetEd</a> - All Rights Reserved.</p>
            <div class="text-center hidden md:block"></div>
        </div>
    </footer>
</body>
<style>
    [data-radix-scroll-area-viewport] {
        scrollbar-width: none;
        -ms-overflow-style: none;
        -webkit-overflow-scrolling: touch;
    }

    [data-radix-scroll-area-viewport]::-webkit-scrollbar {
        display: none;
    }
</style>
</html>