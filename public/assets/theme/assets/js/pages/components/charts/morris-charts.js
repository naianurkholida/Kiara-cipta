"use strict";
// Class definition
var KTMorrisChartsDemo = function() {

    // Private functions
    
    var demo1 = function() {
        // LINE CHART
        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        Morris.Line({
            element: 'kt_morris_1',
            data: [{
                m: '01', // <-- valid timestamp strings
                a: 0
            }, {
                m: '02',
                a: 54
            }, {
                m: '03',
                a: 243
            }, {
                m: '04',
                a: 206
            }, {
                m: '05',
                a: 161
            }, {
                m: '06',
                a: 187
            }, {
                m: '07',
                a: 210
            }, {
                m: '08',
                a: 204
            }, {
                m: '09',
                a: 224
            }, {
                m: '10',
                a: 301
            }, {
                m: '11',
                a: 262
            }, {
                m: '12',
                a: 199
            }, ],
            xkey: 'm',
            ykeys: ['a'],
            labels: ['guest: '],
            xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
                var month = months[x.getMonth()];
                return month;
            },
            dateFormat: function(x) {
                var month = months[new Date(x).getMonth()];
                return month;
            },
        });
    }

    var demo2 = function() {
        // AREA CHART
        new Morris.Area({
            element: 'kt_morris_2',
            data: [{
                    y: '2006',
                    a: 100,
                    b: 90
                },
                {
                    y: '2007',
                    a: 75,
                    b: 65
                },
                {
                    y: '2008',
                    a: 50,
                    b: 40
                },
                {
                    y: '2009',
                    a: 75,
                    b: 65
                },
                {
                    y: '2010',
                    a: 50,
                    b: 40
                },
                {
                    y: '2011',
                    a: 75,
                    b: 65
                },
                {
                    y: '2012',
                    a: 100,
                    b: 90
                }
            ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Series A', 'Series B'],
            lineColors: ['#de1f78', '#c7d2e7'],
            pointFillColors: ['#fe3995','#e6e9f0']
        });
    }

    var demo3 = function() {
        // BAR CHART
        new Morris.Bar({
            element: 'kt_morris_3',
            data: [{
                    y: '2006',
                    a: 100,
                    b: 90
                },
                {
                    y: '2007',
                    a: 75,
                    b: 65
                },
                {
                    y: '2008',
                    a: 50,
                    b: 40
                },
                {
                    y: '2009',
                    a: 75,
                    b: 65
                },
                {
                    y: '2010',
                    a: 50,
                    b: 40
                },
                {
                    y: '2011',
                    a: 75,
                    b: 65
                },
                {
                    y: '2012',
                    a: 100,
                    b: 90
                }
            ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Series A', 'Series B'],
            barColors: ['#2abe81', '#24a5ff']
        });
    }

    var demo4 = function() {
        // PIE CHART
        new Morris.Donut({
            element: 'kt_morris_4',
            data: [{
                    label: "Download Sales",
                    value: 12
                },
                {
                    label: "In-Store Sales",
                    value: 30
                },
                {
                    label: "Mail-Order Sales",
                    value: 20

                }
            ],
            colors: ['#593ae1', '#6e4ff5', '#9077fb']
        });
    }

    return {
        // public functions
        init: function() {
            demo1();
            demo2();
            demo3();
            demo4();
        }
    };
}();

jQuery(document).ready(function() {
    KTMorrisChartsDemo.init();
});