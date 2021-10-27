var datagrid = function (options) {
    'use strict';

    const DATAGRID_DATA = { filter: {}, sorting: {}, pagination: { pageNumber: 0, pageSize: 10 } };
    const DATAGRID_URL = '';
    const DATAGRID_TABLE = '';
    const DATAGRID_ACTION = [];
    const DATAGRID_COLUMNS = [];
    const DATAGRID_ORDERS = [];
    const DATAGRID_SIZE = [10, 25, 50, 100];
    const DATAGRID_NO_DATA_MESSAGE_HEADER = 'Belum Ada Data Tersedia';
    const DATAGRID_NO_DATA_MESSAGE_DESCRIPTION = 'Mohon maaf, sepertinya belum ada data yang dapat kami tampilkan';

    var params = {};

    _init();

    function _init() {
        // Set default values of parameters
        params = {
            url: (options.url == null) ? DATAGRID_URL : options.url,
            table: (options.table == null) ? DATAGRID_TABLE : options.table,
            data: (options.data == null) ? DATAGRID_DATA : options.data,
            action: (options.action == null) ? DATAGRID_ACTION : options.action,
            columns: (options.columns == null) ? DATAGRID_COLUMNS : options.columns,
            orders: (options.orders == null) ? DATAGRID_ORDERS : options.orders,
            size: DATAGRID_SIZE
        };

        _initSorting();
        _addClassPaginationFooter();
        _generatePaginationFooter();

        $(".prevPage" + _getTableId()).click(function (e) {
            e.preventDefault();
            var isNotFirstPage = $(".firstPage" + _getTableId()).val() === 'false';
            if (isNotFirstPage) {
                var prevPage = parseInt($(".currentPage" + _getTableId()).val()) - 1;
                params.data.pagination.pageNumber = prevPage;
                loadData();
            }
        });

        $(".nextPage" + _getTableId()).click(function (e) {
            e.preventDefault();
            
            var isNotLastPage = $(".lastPage" + _getTableId()).val() === 'false';

            if (isNotLastPage) {
                var nextPage = parseInt($(".currentPage" + _getTableId()).val()) + 1;
                params.data.pagination.pageNumber = nextPage;
                loadData();
            }
        });

        $(".datagrid-size" + _getTableId()).change(function () {
            params.data.pagination.pageSize = $(this).val();
            loadData();
        });
    }

    function _initSorting() {
        var th = $(params.table + ' > thead > tr:first > th');

        th.each(function (index) {
            var sortable = params.orders[index].sortable;
            var sortableColumn = $(this);
            if (sortable) {
                var columnName = params.orders[index].name;

                sortableColumn.addClass("sortable");
                sortableColumn.attr("aria-sort", "desc");
                sortableColumn.click(function () {
                    $(params.table + " > thead > tr:first > th.sortable").each(function () {
                        $(this).removeClass("sorting");
                    });
                    sortableColumn.addClass("sorting");

                    var ariaSort = $(this).attr("aria-sort");
                    var isSorting = $(this).hasClass("sorting");
                    var ascDesc = (ariaSort === "asc" && isSorting) ? 'desc' : 'asc';

                    $(this).attr("aria-sort", ascDesc);

                    if (isSorting) {
                        params.data.sorting = {
                            key: columnName,
                            order: ascDesc
                        }
                        loadData();
                    }
                });
            }
        });



    }

    function loadData() {
        var table = $(params.table + ' > tbody');

        table.html('');

        params.data.pagination.pageSize = $(".datagrid-size" + _getTableId()).val();

        $.ajax({
            url: params.url,
            method: "POST",
            data: JSON.stringify(params.data),
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).then(function (data) {
            var noContents = true;
            var content = data.data.content;
            var currentPage = data.data.number;
            var pageSize = data.data.size;

            $(".firstPage" + _getTableId()).val(data.data.first);
            $(".lastPage" + _getTableId()).val(data.data.last);
            $(".currentPage" + _getTableId()).val(data.data.number);

            _showPageInformation(data.data);

            _generatePages(data.data.totalPages, currentPage);
            table.html('');

            content.forEach(function (item, index) {
                noContents = false;
                var nomor = ((index + 1) + (currentPage * pageSize));
                var tr = '<tr>';
                var td = '<td style="color:black; font-size:13px" class="text-center">' + nomor + '</td>';


                params.columns.forEach((column) =>{
                    var value = (typeof column.format==='function') ? column.format(item[column.name]) : item[column.name];
                    td += '<td style="color:black; font-size:13px" class="' + column.class + '">' + value + '</td>';
                });

                if (params.action.length > 0) {
                    td += '<td class="text-center">';
                    params.action.forEach(function (action) {
                        var target = (action.target) ? ' target="' + action.target + '"' : '';
                        td += '<a href="' + _parseActionUrl(action.url, item) + '"' + target + '" class="' + action.btnClass + '">' + action.btnText + '</a> &nbsp;';
                    });
                    td += '</td>';
                }


                tr += td + '</tr>';
                table.append(tr);
            });
            if (noContents) {
                table.html('<tr><td colspan="' + params.orders.length + '" class="text-center p-5">' +
                    '<p class="no-data-image"></p><br><h4 class="text-bold">' + DATAGRID_NO_DATA_MESSAGE_HEADER + '</h4>' +
                    '<h6>' + DATAGRID_NO_DATA_MESSAGE_DESCRIPTION + '</h6></td></tr>');
            }
        });
    }

    function _parseActionUrl(url, item){
        var keys = url.match(/{([^}]+)}/g);
        keys.forEach((k) => {
            var key = k.replace(/[{}]/g, "");
            var columnKey = Object.keys(item).find((i) => i==key);
            var columnValue = item[columnKey];
            url = url.replace(new RegExp('\{' + key + '\}', 'gi'), columnValue);
        })
        return url;
    }

    function _generatePages(numberOfPages, currentPage) {
        $(".pagination-page" + _getTableId()).remove();

        var truncatedPages = _pagination(currentPage + 1, numberOfPages)

        truncatedPages.forEach((value) => {

            var isActive = value === (currentPage + 1);
            var activeClass = '';

            if (isActive) {
                activeClass = 'active';
            } else if (isNaN(value)) {
                activeClass = 'disabled';
            }

            var page = (!isNaN(value)) ? value - 1 : value;
            $('<li class="page-item ' + activeClass + '">' +
                '<a class="page-link pagination-page' + _getTableId() + '" data-page' + _getTableId() + '="' + page + '" href="#">' + value + '</a></li>').insertBefore(".nextPage" + _getTableId());
        });

        $(".pagination-page" + _getTableId()).each(function () {
            $(this).click(function (e) {
                e.preventDefault();
                params.data.pagination.pageNumber = $(this).attr('data-page' + _getTableId());
                loadData();

            });
        });
    }

    function _showPageInformation(data) {
        var start = 1 + (data.number * data.size);
        var end = start + (data.numberOfElements - 1);
        $(".pagination-number" + _getTableId()).text(start);
        $(".pagination-size" + _getTableId()).text(end);
        $(".pagination-totalElements" + _getTableId()).text(data.totalElements);
    }

    function _pagination(c, m) {
        var current = c,
            last = m,
            delta = 2,
            left = current - delta,
            right = current + delta + 1,
            range = [],
            rangeWithDots = [],
            l;

        for (let i = 1; i <= last; i++) {
            if (i == 1 || i == last || i >= left && i < right) {
                range.push(i);
            }
        }

        for (let i of range) {
            if (l) {
                if (i - l === 2) {
                    rangeWithDots.push(l + 1);
                } else if (i - l !== 1) {
                    rangeWithDots.push('...');
                }
            }
            rangeWithDots.push(i);
            l = i;
        }

        return rangeWithDots;
    }

    function _generatePaginationFooter() {
        var footer = '<div class="row">' +
            '<div class="col-md-4">' +
            '<span class="pagination-number' + _getTableId() + '" style="font-weight:bold;">0</span> s/d <span class="pagination-size' + _getTableId() + '" style="font-weight:bold;">0</span> dari <span class="pagination-totalElements' + _getTableId() + '" style="font-weight:bold;">0</span> data' +

            '</div>' +
            '<div class="col-md-4">' +
            _generateDatagridSize() +
            '</div>' +
            '<div class="col-md-4">' +
            '<ul class="pagination pagination-sm float-right">' +
            '<li class="page-item prevPage' + _getTableId() + '"><a class="page-link" href="#">Sebelumnya</a></li>' +
            '<input type="hidden" class="firstPage' + _getTableId() + '" value=""/>' +
            '<input type="hidden" class="lastPage' + _getTableId() + '" value=""/>' +
            '<input type="hidden" class="currentPage' + _getTableId() + '" value="0"/>' +
            '<li class="page-item nextPage' + _getTableId() + '"><a class="page-link" href="#">Berikutnya</a></li>' +
            '</ul>' +
            '</div>' +
            '</div>';
        $(".pagination-footer" + _getTableId()).html(footer);

    }

    function _generateDatagridSize() {
        var size = '<div class="text-center">' +
            '<label>' +
            '<select class="datagrid-size' + _getTableId() + '">';
        params.size.forEach((s) => {
            size += '<option value="' + s + '">' + s + '</option>';
        });

        size += '</select>&nbsp;</label></div>';
        return size;
    }

    function _addClassPaginationFooter() {
        $(params.table).parent().next().removeClass('pagination-footer').addClass('pagination-footer' + _getTableId());
    }

    function _getTableId() {
        return '_' + params.table.substring(1);
    }

    function setFilters(filters) {
        params.data.filter = filters;
    }

    return {
        reload: loadData,
        setFilters: setFilters,
    };
}