<html lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <title>{{ App\Services\SettingService::getSetting('site_title') }} |
        {{ App\Services\SettingService::getSetting('tagline') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <!-- App favicon -->
    <link rel="icon" type="image/x-icon" href="{{Storage::url(App\Services\SettingService::getSetting('favicon'))}}">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

    <style type="text/css">
        .jqstooltip {
            position: absolute;
            left: 0px;
            top: 0px;
            visibility: hidden;
            background: rgb(0, 0, 0) transparent;
            background-color: rgba(0, 0, 0, 0.6);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            padding: 5px;
            border: 1px solid white;
            box-sizing: content-box;
            z-index: 10000;
        }

        .jqsfield {
            color: white;
            font: 10px arial, san serif;
            text-align: left;
        }
    </style>
    <style>
        .keyword-info-container {
            box-sizing: border-box;
            width: 100%;
            margin-bottom: 20px;
            font-size: 12px;
            border-bottom: 1px solid #dee1e5
        }

        .keyword-info-container.youtube {
            margin-bottom: 0;
            border-bottom: none
        }

        .keyword-info-container .title {
            color: #26282d;
            font-size: 17px;
            font-weight: bold
        }

        .keyword-info-container .tabs {
            list-style: none;
            display: flex;
            justify-content: flex-start;
            border-bottom: 1px solid #dee1e5;
            margin-top: -10px;
            padding: 0px 16px;
            align-items: center
        }

        .keyword-info-container .tabs li {
            padding: 8px;
            padding-left: 0;
            color: #000;
            cursor: pointer;
            font-size: 12px
        }

        .keyword-info-container .tabs li.small {
            font-size: 10px
        }

        .keyword-info-container .tabs li:last-child {
            overflow: hidden
        }

        .keyword-info-container .tabs li.active {
            color: #4285f4
        }

        table.keyword-info-table {
            border-collapse: collapse;
            width: 100%;
            color: #000;
            font-size: 12px;
            position: relative
        }

        .keyword-info-table thead {
            height: 50px
        }

        .keyword-info-table th {
            padding: 10px;
            padding-left: 0;
            font-weight: bold;
            color: #000;
            font-size: 12px
        }

        .keyword-info-table th:first-child {
            padding-left: 16px
        }

        .keyword-info-table th:last-child {
            padding-right: 16px
        }

        .keyword-info-table td {
            border-bottom: 1px solid #dee1e5;
            padding: 10px;
            padding-left: 0;
            height: 50px;
            box-sizing: border-box
        }

        .keyword-info-table td:first-child {
            padding-left: 16px
        }

        .keyword-info-table td:last-child {
            padding-right: 16px
        }

        .keyword-info-table tfoot tr {
            background-color: rgba(222, 225, 229, .2666666667)
        }

        .keyword-info-table tfoot tr:last-child td {
            border-bottom: none
        }

        .ubersuggest-button {
            color: #0086f7;
            font-family: Figtree;
            font-size: 14px;
            font-weight: bold;
            line-height: 29px;
            padding: 8px 30px;
            border: 1px solid #0086f7;
            background-color: #fff;
            border-radius: 2px;
            outline: none;
            border: none;
            cursor: pointer;
            margin: 4px
        }

        .ubersuggest-logo-wrapper {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin: 10px 10px 0 0;
            font-weight: bold;
            color: #26282d
        }

        .ubersuggest-logo {
            width: 182px;
            height: 33px;
            cursor: pointer
        }

        .keyword-info-container .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 0;
            padding: 20px 16px;
            border-top: 1px solid #dee1e5
        }

        .header h2 {
            color: #000;
            font-family: Figtree;
            font-size: 24px;
            font-weight: 500
        }

        html[dark] .keyword-info-container .title {
            color: #fff
        }

        html[dark] .keyword-info-container .tabs {
            border-color: rgba(255, 255, 255, .0509803922)
        }

        html[dark] .keyword-info-container .tabs li {
            color: #fff
        }

        html[dark] .keyword-info-container .tabs li.active {
            color: #4285f4
        }

        html[dark] table.keyword-info-table {
            color: #fff
        }

        html[dark] .keyword-info-table th {
            color: #fff
        }

        html[dark] .keyword-info-table tfoot tr {
            background-color: #3d3d3d
        }

        html[dark] .keyword-info-table tfoot tr:last-child td .button-arrow {
            border-color: #fff
        }

        .keyword-info-table tfoot tr:last-child td .button-arrow.disabled {
            border-color:#9b9b9b !important}body[data-dt="1"] .keyword-info-container .title{color:#fff}body[data-dt="1"] .keyword-info-container .tabs{border-color:rgba(255,255,255,.0509803922)}body[data-dt="1"] .keyword-info-container .tabs li{color:#fff}body[data-dt="1"] .keyword-info-container .tabs li.active{color:#4285f4}body[data-dt="1"] table.keyword-info-table{color:#fff}body[data-dt="1"] .keyword-info-table th{color:#fff}body[data-dt="1"] .keyword-info-table tfoot tr{background-color:#3d3d3d}body[data-dt="1"] .keyword-info-table tfoot tr:last-child td .button-arrow {
                border-color: #fff
            }
    </style>
    <style>
        .tippy-box[data-theme~=transparent] {
            background-color: rgba(0, 0, 0, 0);
            background-clip: padding-box;
            border: none;
            color: #333;
            box-shadow: none
        }

        .tippy-box[data-theme~=transparent]>.tippy-backdrop {
            background-color: rgba(0, 0, 0, 0)
        }

        .tippy-box[data-theme~=transparent]>.tippy-arrow:after,
        .tippy-box[data-theme~=transparent]>.tippy-svg-arrow:after {
            content: "";
            position: absolute;
            z-index: -1
        }

        .tippy-box[data-theme~=transparent]>.tippy-arrow:after {
            border-color: rgba(0, 0, 0, 0);
            border-style: solid
        }

        .tippy-box[data-theme~=transparent][data-placement^=top]>.tippy-arrow:before {
            border-top-color: rgba(0, 0, 0, 0)
        }

        .tippy-box[data-theme~=transparent][data-placement^=top]>.tippy-arrow:after {
            border-top-color: rgba(0, 0, 0, 0);
            border-width: 7px 7px 0;
            top: 17px;
            left: 1px
        }

        .tippy-box[data-theme~=transparent][data-placement^=top]>.tippy-svg-arrow>svg {
            top: 16px
        }

        .tippy-box[data-theme~=transparent][data-placement^=top]>.tippy-svg-arrow:after {
            top: 17px
        }

        .tippy-box[data-theme~=transparent][data-placement^=bottom]>.tippy-arrow:before {
            border-bottom-color: rgba(0, 0, 0, 0);
            bottom: 16px
        }

        .tippy-box[data-theme~=transparent][data-placement^=bottom]>.tippy-arrow:after {
            border-bottom-color: rgba(0, 0, 0, 0);
            border-width: 0 7px 7px;
            bottom: 17px;
            left: 1px
        }

        .tippy-box[data-theme~=transparent][data-placement^=bottom]>.tippy-svg-arrow>svg {
            bottom: 16px
        }

        .tippy-box[data-theme~=transparent][data-placement^=bottom]>.tippy-svg-arrow:after {
            bottom: 17px
        }

        .tippy-box[data-theme~=transparent][data-placement^=left]>.tippy-arrow:before {
            border-left-color: rgba(0, 0, 0, 0)
        }

        .tippy-box[data-theme~=transparent][data-placement^=left]>.tippy-arrow:after {
            border-left-color: rgba(0, 0, 0, 0);
            border-width: 7px 0 7px 7px;
            left: 17px;
            top: 1px
        }

        .tippy-box[data-theme~=transparent][data-placement^=left]>.tippy-svg-arrow>svg {
            left: 11px
        }

        .tippy-box[data-theme~=transparent][data-placement^=left]>.tippy-svg-arrow:after {
            left: 12px
        }

        .tippy-box[data-theme~=transparent][data-placement^=right]>.tippy-arrow:before {
            border-right-color: rgba(0, 0, 0, 0);
            right: 16px
        }

        .tippy-box[data-theme~=transparent][data-placement^=right]>.tippy-arrow:after {
            border-width: 7px 7px 7px 0;
            right: 17px;
            top: 1px;
            border-right-color: rgba(0, 0, 0, 0)
        }

        .tippy-box[data-theme~=transparent][data-placement^=right]>.tippy-svg-arrow>svg {
            right: 11px
        }

        .tippy-box[data-theme~=transparent][data-placement^=right]>.tippy-svg-arrow:after {
            right: 12px
        }

        .tippy-box[data-theme~=transparent]>.tippy-svg-arrow {
            fill: rgba(0, 0, 0, 0)
        }

        .tippy-box[data-theme~=transparent]>.tippy-svg-arrow:after {
            background-size: 16px 6px;
            width: 16px;
            height: 6px
        }
    </style>
    <style>
        .tippy-box[data-animation=fade][data-state=hidden] {
            opacity: 0
        }

        [data-tippy-root] {
            max-width: calc(100vw - 10px)
        }

        .tippy-box {
            position: relative;
            background-color: #333;
            color: #fff;
            border-radius: 4px;
            font-size: 14px;
            line-height: 1.4;
            white-space: normal;
            outline: 0;
            transition-property: transform, visibility, opacity
        }

        .tippy-box[data-placement^=top]>.tippy-arrow {
            bottom: 0
        }

        .tippy-box[data-placement^=top]>.tippy-arrow:before {
            bottom: -7px;
            left: 0;
            border-width: 8px 8px 0;
            border-top-color: initial;
            transform-origin: center top
        }

        .tippy-box[data-placement^=bottom]>.tippy-arrow {
            top: 0
        }

        .tippy-box[data-placement^=bottom]>.tippy-arrow:before {
            top: -7px;
            left: 0;
            border-width: 0 8px 8px;
            border-bottom-color: initial;
            transform-origin: center bottom
        }

        .tippy-box[data-placement^=left]>.tippy-arrow {
            right: 0
        }

        .tippy-box[data-placement^=left]>.tippy-arrow:before {
            border-width: 8px 0 8px 8px;
            border-left-color: initial;
            right: -7px;
            transform-origin: center left
        }

        .tippy-box[data-placement^=right]>.tippy-arrow {
            left: 0
        }

        .tippy-box[data-placement^=right]>.tippy-arrow:before {
            left: -7px;
            border-width: 8px 8px 8px 0;
            border-right-color: initial;
            transform-origin: center right
        }

        .tippy-box[data-inertia][data-state=visible] {
            transition-timing-function: cubic-bezier(0.54, 1.5, 0.38, 1.11)
        }

        .tippy-arrow {
            width: 16px;
            height: 16px;
            color: #333
        }

        .tippy-arrow:before {
            content: "";
            position: absolute;
            border-color: rgba(0, 0, 0, 0);
            border-style: solid
        }

        .tippy-content {
            position: relative;
            padding: 5px 9px;
            z-index: 1
        }
    </style>
    <style>
        .tippy-box[data-theme~=light] {
            color: #26323d;
            box-shadow: 0 0 20px 4px rgba(154, 161, 177, .15), 0 4px 80px -8px rgba(36, 40, 47, .25), 0 4px 4px -2px rgba(91, 94, 105, .15);
            background-color: #fff
        }

        .tippy-box[data-theme~=light][data-placement^=top]>.tippy-arrow:before {
            border-top-color: #fff
        }

        .tippy-box[data-theme~=light][data-placement^=bottom]>.tippy-arrow:before {
            border-bottom-color: #fff
        }

        .tippy-box[data-theme~=light][data-placement^=left]>.tippy-arrow:before {
            border-left-color: #fff
        }

        .tippy-box[data-theme~=light][data-placement^=right]>.tippy-arrow:before {
            border-right-color: #fff
        }

        .tippy-box[data-theme~=light]>.tippy-backdrop {
            background-color: #fff
        }

        .tippy-box[data-theme~=light]>.tippy-svg-arrow {
            fill: #fff
        }
    </style>
    <style>
        .ubersuggest-header-container {
            box-sizing: border-box;
            width: 100%;
            font-size: 12px
        }

        .ubersuggest-header-container .row {
            margin: 0;
            padding: 15px 16px 15px 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-height: 30px
        }

        .ue-enable {
            display: block
        }

        .ue-disable {
            display: none !important
        }

        .ubersuggest-header-container .settings {
            display: flex;
            align-items: center;
            margin-right: 18px
        }

        .ubersuggest-header-container .settings-label {
            margin-right: 21px
        }

        .ubersuggest-header-container .settings-icon {
            width: 21px;
            height: 21px;
            margin-right: 7px
        }
    </style>
    <style>
        .keyword-info-section {
            color: #26282d;
            font-family: Arial;
            font-size: 12px;

            padding:8px 0 10px 8px;display:flex;align-items:center}.keyword-info-section.hidden{display:none}.keyword-info-section.google{background-color:#fff}body[data-dt="1"] .keyword-info-section.google {
                background-color: #303134
            }

            .keyword-info-section.youtube {
                margin-right: 15px;
                padding: 0 0 0 10px;
                height: 100%;
                background-color: #fff
            }

            .keyword-info-section.amazon {
                padding: 13px 0;
                background-color: #fff
            }
    </style>
    <style>
        .kw-overview-container {
            box-sizing: border-box;
            width: 673px;
            padding: 0;
            margin: 0;
            margin-top: 14px;
            font-size: 12px;
            font-family: Arial
        }

        .kw-overview-container.youtube {
            box-sizing: border-box;
            width: 100%;
            padding: 0;
            margin: 0;
            font-size: 12px
        }
    </style>
    <style>
        .bl-info-container {
            box-sizing: border-box;
            width: 100%;
            padding: 0;
            margin: 0;
            font-size: 12px
        }

        .bl-info-header {
            display: flex;
            min-height: 24px;
            width: 100%;
            padding: 0;
            justify-content: space-between;
            cursor: pointer;
            box-sizing: border-box;
            margin-bottom: 5px
        }

        .bl-info-header .row {
            display: flex;
            margin: 0;
            width: 100%;
            justify-content: space-between
        }

        .bl-info-header .row.youtube {
            justify-content: flex-start
        }

        .bl-info-content,
        .kw-info-content {
            width: 99%;
            display: flex;
            flex-direction: column;

            border:1px solid #dee1e5;border-radius:8px;padding-top:0}body[data-dt="1"] .kw-info-content,body[data-dt="1"] .bl-info-content {
                background: #2a2a2a;
                border-color: #2a2a2a
            }

            .bl-info-content img.loading {
                width: 50px;
                margin: 0 auto;
                margin-bottom: 10px
            }

            .kw-info-content img.loading {
                width: 50px;

                margin:0 auto;margin-top:10px;margin-bottom:10px}table.bl-info-table,table.kw-info-table{border-collapse:collapse;width:100%;color:#808185;font-size:12px}body[data-dt="1"] table.bl-info-table,body[data-dt="1"] table.kw-info-table {
                    color: #fff
                }

                .bl-info-table thead,
                .kw-info-table thead {
                    height: 50px
                }

                .bl-info-table tr,
                .kw-info-table tr {
                    width: 100%;
                    max-width: 600px
                }

                .bl-info-table th,
                .kw-info-table th {
                    padding: 10px;
                    padding-left: 0;
                    font-weight: bold;
                    color: #000;
                    font-size: 11px;

                    border-bottom:1px solid #dee1e5}body[data-dt="1"] .bl-info-table th,body[data-dt="1"] .kw-info-table th {
                        color: #fff
                    }

                    .bl-info-table th:first-child,
                    .kw-info-table th:first-child {
                        padding-left: 16px
                    }

                    .bl-info-table th:last-child,
                    .kw-info-table th:last-child {
                        border-right: none;
                        padding-right: 16px
                    }

                    .bl-info-table td,
                    .kw-info-table td {
                        border-bottom:1px solid #dee1e5;padding:10px;padding-left:0;max-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#000}body[data-dt="1"] .bl-info-table td,body[data-dt="1"] .kw-info-table td {
                            color: #fff
                        }

                        .bl-info-table td:first-child,
                        .kw-info-table td:first-child {
                            border-left: none;
                            padding-left: 16px
                        }

                        .bl-info-table td:last-child,
                        .kw-info-table td:last-child {
                            border-right: none;
                            padding-right: 16px
                        }

                        .bl-info-table tfoot tr:last-child td,
                        .kw-info-table tfoot tr:last-child td {
                            border-bottom: none
                        }

                        .bl-info-container .row {
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                            margin-top: 10px;
                            margin-bottom: 20px;
                            flex-wrap: wrap
                        }
    </style>
    <style>
        .statistics-graph-container {
            box-sizing: border-box;
            width: 100%;
            margin-bottom: 5px;
            font-size: 12px;
            padding: 0px 16px
        }

        .statistics-graph-container .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px 0 20px 0
        }

        .statistics-graph-container .row .title {
            color: #26282d;
            font-size: 17px;
            font-weight: bold
        }

        .statistics-graph-container .tabs {
            list-style: none;
            display: flex;
            justify-content: flex-start;
            border-bottom: 1px solid #dee1e5;
            margin: 0 -16px;
            margin-bottom: 10px;
            margin-top: -10px;
            padding: 0px 16px
        }

        .statistics-graph-container .tabs li {
            display: flex;
            align-items: center;
            padding: 8px 16px;
            color: #000;
            cursor: pointer;
            font-size: 13px;
            border-bottom: 3px solid rgba(0, 0, 0, 0)
        }

        .statistics-graph-container .tabs li:first-child {
            margin-left: -16px
        }

        .statistics-graph-container .tabs li.active {
            color: #4285f4;

            border-bottom:3px solid #4285f4}body[data-dt="1"] .statistics-graph-container .row .title{color:#fff}body[data-dt="1"] .statistics-graph-container .tabs {
                border-bottom:1px solid #dee1e5}body[data-dt="1"] .statistics-graph-container .tabs li{color:#fff}body[data-dt="1"] .statistics-graph-container .tabs li.active {
                    color: #fff;
                    border-bottom: 3px solid #fff
                }
    </style>
    <style>
        .rr--group {
            display: flex;
            width: 100%;
            position: relative
        }

        .rr--box {
            display: flex;
            width: 100%;
            flex-grow: 1;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0)
        }

        .rr--svg {
            display: flex;
            aspect-ratio: 1;
            width: 100%;
            flex-grow: 1;
            overflow: clip;
            pointer-events: none
        }

        @supports not (overflow: clip) {
            .rr--svg {
                overflow: auto
            }
        }

        .rr--box:focus,
        .rr--box:focus-visible,
        .rr-reset:focus-visible,
        .rr-reset:focus {
            outline: none;
            box-shadow: none
        }

        .rr--focus-reset {
            outline: 6px double #0079ff
        }

        .rr--box:focus-visible .rr--svg {
            outline: 6px double #0079ff;
            isolation: isolate
        }

        .rr--reset {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border: 0;
            right: 0;
            bottom: 50%
        }

        [dir=rtl] .rr--reset {
            left: 0;
            right: auto
        }

        .rr--dir-y .rr--reset {
            bottom: 0;
            right: 50%
        }

        .rr--disabled {
            opacity: .5;
            cursor: not-allowed
        }

        .rr--disabled .rr--svg {
            pointer-events: none
        }

        .rr--pointer .rr--box {
            cursor: pointer
        }

        .rr--dir-x {
            flex-direction: row
        }

        .rr--dir-y {
            flex-direction: column
        }

        .rr--space-sm .rr--svg {
            padding: 8%
        }

        .rr--space-md .rr--svg {
            padding: 12.5%
        }

        .rr--space-lg .rr--svg {
            padding: 17.5%
        }

        .rr--dir-x.rr--gap-sm .rr--svg {
            margin: 0 6.25%
        }

        .rr--dir-x.rr--gap-sm .rr--box:focus-visible:after {
            width: 87.5%;
            left: 6.25%
        }

        .rr--dir-x.rr--gap-md .rr--svg {
            margin: 0 12.5%
        }

        .rr--dir-x.rr--gap-md .rr--box:focus-visible:after {
            width: 75%;
            left: 12.5%
        }

        .rr--dir-x.rr--gap-lg .rr--svg {
            margin: 0 25%
        }

        .rr--dir-x.rr--gap-lg .rr--box:focus-visible:after {
            width: 50%;
            left: 25%
        }

        .rr--dir-y.rr--gap-sm .rr--svg {
            margin: 6.25% 0
        }

        .rr--dir-y.rr--gap-md .rr--svg {
            margin: 12.5% 0
        }

        .rr--dir-y.rr--gap-lg .rr--svg {
            margin: 25% 0
        }

        .rr--rx-sm .rr--svg {
            border-radius: 5%
        }

        .rr--rx-md .rr--svg {
            border-radius: 15%
        }

        .rr--rx-lg .rr--svg {
            border-radius: 20%
        }

        .rr--rx-full .rr--svg {
            border-radius: 100%
        }

        .rr--has-stroke .rr--svg {
            stroke-linecap: round;
            stroke-linejoin: round
        }

        .rr--has-border .rr--svg {
            border-width: var(--rr--border-width);
            border-style: solid
        }

        .rr--on .rr--svg {
            fill: var(--rr--fill-on-color, none)
        }

        .rr--off .rr--svg {
            fill: var(--rr--fill-off-color, none)
        }

        .rr--has-stroke .rr--on .rr--svg {
            stroke: var(--rr--stroke-on-color, currentColor)
        }

        .rr--has-stroke .rr--off .rr--svg {
            stroke: var(--rr--stroke-off-color, currentColor)
        }

        .rr--on .rr--svg {
            background-color: var(--rr--box-on-color, none)
        }

        .rr--off .rr--svg {
            background-color: var(--rr--box-off-color, none)
        }

        .rr--has-border .rr--off .rr--svg {
            border-color: var(--rr--border-off-color, currentColor)
        }

        .rr--has-border .rr--on .rr--svg {
            border-color: var(--rr--border-on-color, currentColor)
        }

        .rr--fx-colors {
            --rr--easing: .2s cubic-bezier(.61, 1, .88, 1)
        }

        .rr--fx-colors .rr--svg {
            transition-duration: .2s;
            transition-timing-function: var(--rr--easing);
            transition-property: background-color, border-color, fill, stroke
        }

        .rr--fx-opacity .rr--off {
            opacity: .35;
            transition: opacity var(--rr--easing)
        }

        .rr--fx-opacity .rr--on {
            opacity: 1
        }

        @media(hover: hover) {
            .rr--fx-opacity .rr--box:hover {
                opacity: 1
            }
        }

        @media(hover: hover) {
            .rr--fx-zoom .rr--box {
                transition: transform var(--rr--easing);
                transform: scale(1)
            }

            .rr--fx-zoom .rr--box:hover {
                transform: scale(1.2)
            }
        }

        @media(hover: hover)and (prefers-reduced-motion) {
            .rr--fx-zoom .rr--box:hover {
                transform: scale(1)
            }
        }

        @media(hover: hover) {
            .rr--fx-position .rr--box {
                transition: transform var(--rr--easing);
                transform: translateY(0)
            }

            .rr--fx-position .rr--box:hover {
                transform: translateY(-15%)
            }
        }

        @media(hover: hover)and (prefers-reduced-motion) {
            .rr--fx-position .rr--box:hover {
                transform: translateY(0)
            }
        }

        .rr--svg-stop-1 {
            stop-color: var(--rr--fill-on-color, rgba(0, 0, 0, 0))
        }

        [dir=rtl] .rr--svg-stop-1,
        .rr--svg-stop-2 {
            stop-color: var(--rr--fill-off-color, rgba(0, 0, 0, 0))
        }

        [dir=rtl] .rr--svg-stop-2 {
            stop-color: var(--rr--fill-on-color, rgba(0, 0, 0, 0))
        }

        .rr--hf-svg-on {
            fill: var(--rr--fill-on-color, none)
        }

        .rr--hf-svg-off {
            fill: var(--rr--fill-off-color, none)
        }

        .rr--has-stroke .rr--hf-svg-on {
            stroke: var(--rr--stroke-on-color, currentColor)
        }

        .rr--has-stroke .rr--hf-svg-off {
            stroke: var(--rr--stroke-off-color, currentColor)
        }

        .rr--hf-svg-on .rr--svg,
        .rr--hf-svg-off .rr--svg {
            background-color: var(--rr--box-off-color, none)
        }

        .rr--has-border .rr--hf-svg-on .rr--svg {
            border-color: var(--rr--border-on-color, currentColor)
        }

        .rr--has-border .rr--hf-svg-off .rr--svg {
            border-color: var(--rr--border-off-color, currentColor)
        }

        .rr--dir-x .rr--hf-box-int .rr--svg {
            background: linear-gradient(to right, var(--rr--box-on-color, none) 50%, var(--rr--box-off-color, none) 50%)
        }

        [dir=rtl] .rr--dir-x .rr--hf-box-int .rr--svg {
            background: linear-gradient(to left, var(--rr--box-on-color, none) 50%, var(--rr--box-off-color, none) 50%)
        }

        .rr--dir-y .rr--hf-box-int .rr--svg {
            background: linear-gradient(to bottom, var(--rr--box-on-color, none) 50%, var(--rr--box-off-color, none) 50%)
        }

        .rr--hf-box-on .rr--svg {
            background-color: var(--rr--box-on-color, none)
        }

        .rr--hf-box-off .rr--svg {
            background-color: var(--rr--box-off-color, none)
        }

        .rr--hf-box-on .rr--svg,
        .rr--hf-box-off .rr--svg,
        .rr--hf-box-int .rr--svg {
            fill: var(--rr--fill-off-color, none)
        }

        .rr--has-stroke .rr--hf-box-on .rr--svg,
        .rr--has-stroke .rr--hf-box-off .rr--svg,
        .rr--has-stroke .rr--hf-box-int .rr--svg {
            stroke: var(--rr--stroke-off-color, currentColor)
        }

        .rr--has-border .rr--hf-box-on .rr--svg,
        .rr--has-border .rr--hf-box-int .rr--svg {
            border-color: var(--rr--border-on-color, currentColor)
        }

        .rr--has-border .rr--hf-box-off .rr--svg {
            border-color: var(--rr--border-off-color, currentColor)
        }
    </style>
</head>

<body cz-shortcut-listen="true">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">

                            <h3 class="text-center mt-5 mb-4">
                                <a href="index.html" class="d-block auth-logo">
                                    EKAS
                                </a>
                            </h3>

                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Welcome Back !</h4>
                                <p class="text-muted text-center">Sign in to continue to EKAS.</p>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <div class="login-input">
                                            <input type="email" name="email" id="" value="{{ old('email') }}"
                                                required class="form-control" placeholder="Enter Email Here">
                                            @error('email')
                                                <span class="text-danger">
                                                    <small>{{ $message }}</small>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-group" >
                                        <label for="">Password</label>
                                        <div class="login-input password-div">
                                            <input type="password" name="password" id="" value="{{ old('password') }}" required class="form-control" placeholder="Enter Password Here">
                                        </div>
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
            
                                    <div class="text-center mt-3">
                                        <button class="btn btn-primary">Log in</button>
                                    </div>
                                    {{-- @if (Route::has('password.request'))
                                        <a class="btn btn-link text-dark" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>2024 EKAS <span class="d-none d-sm-inline-block"> - Crafted with <i
                                class="mdi mdi-heart text-danger"></i> by Webs98.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>



    <div class="ue-sidebar-container"><iframe
            srcdoc="<!DOCTYPE html><html><head></head><body><div class=&quot;frame-root&quot;></div></body></html>"></iframe>
    </div>
</body>

</html>
