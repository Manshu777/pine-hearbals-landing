<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Sample Record – {{ $record->product_name ?? 'Record' }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    /* --- Page setup (A4) --- */
    @page { margin: 28mm 18mm 22mm 18mm; }
    body { font-family: "DejaVu Sans", Arial, sans-serif; font-size: 12px; color: #1b1b1b; }
    * { box-sizing: border-box; }

    /* --- Header / Footer --- */
    header { position: fixed; top: -22mm; left: 0; right: 0; height: 22mm; }
    .header-wrap { display: flex; align-items: center; gap: 12px; }
    .logo { width: 42px; height: 42px; object-fit: contain; }
    .company-title { font-size: 16px; font-weight: 700; letter-spacing: .5px; margin: 0; }
    .company-sub { margin: 2px 0 0; font-size: 11px; color: #555; }
    .license { font-size: 11px; color: #222; margin-top: 2px; }

    footer { position: fixed; bottom: -16mm; left: 0; right: 0; height: 16mm; text-align: right; font-size: 10px; color: #666; }
    .page-num:after { content: counter(page) " / " counter(pages); }

    /* --- Section headings --- */
    h3.section-title {
        margin: 18px 0 8px;
        font-size: 13px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .6px;
        color: #0f5132;
        border-left: 4px solid #198754;
        padding-left: 8px;
    }

    /* --- Tables --- */
    table { width: 100%;   border: 1px solid #e0e0e0;  border-collapse: collapse; }
   
    .table th, .table td { padding: 10px 12px; vertical-align: top; }
    .table thead th {
        background: #f4f9f6; color: #0f5132; text-align: left; font-weight: 700; font-size: 12px;
        border-bottom: 1px solid #e0e0e0;
    }
    .table tbody tr:nth-child(even) td { background: #fcfcfc; }
    .table tbody td.label { width: 32%; color: #444; font-weight: 600; }
    .table tbody td.value { width: 68%; color: #111; }

    /* --- Summary band --- */
    .band {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        background: #f8f9fa;
        padding: 10px 12px; margin-top: 8px;
    }
    .band .item { font-size: 12px; }
    .band .label { color: #666; margin-right: 6px; }
    .band .value { color: #111; font-weight: 600; }

    /* --- Signature area --- */
    .signatures { margin-top: 18px; }
    .sign-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
    .sign-box { text-align: left; font-size: 12px; }
    .line { border-bottom: 1px dashed #bbb; height: 20px; margin-bottom: 6px; }
    .sign-label { font-size: 11px; color: #555; }

    /* --- Utility --- */
    .mt-8 { margin-top: 8px; }
    .mb-6 { margin-bottom: 6px; }
    .small { font-size: 11px; color: #666; }

    table, th, td {
    border: 2px solid black; /* full definition */
}

td, th {
    padding:2px; /* optional for spacing */
}
 

    /* Dompdf note: avoid fixed heights on content tables for page breaks */
</style>
</head>
<body>

<header>
    <div class="header-wrap">
        {{-- Optional logo: replace with your asset path or remove the <img> --}}
        {{-- <img class="logo" src="{{ public_path('images/logo.png') }}" alt="Logo"> --}}
        <div>
            <p class="company-title">PINE HERBALS INDIA</p>
            <p class="company-sub">Village Regian, Jalbera Road, Ambala Cantt. 133006</p>
            <p class="license">Manufacturing License No.: 898 ISM HR.</p>
        </div>
    </div>
    <hr style="margin:6px 0 0;border:none;border-top:1px solid #e0e0e0;">
</header>


<main>


    <table class="table" style="border: 2px;">
        <tbody>
            <tr><td class="label">S.No</td><td class="value">{{ $record->s_no ?? '—' }}</td></tr>
            <tr><td class="label">Date of Record</td><td class="value">{{ $record->date_of_record ?? '—' }}</td></tr>
            <tr><td class="label">Item Name</td><td class="value">{{ $record->item_name ?? '—' }}</td></tr>
            <tr><td class="label">Product Name</td><td class="value">{{ $record->product_name ?? '—' }}</td></tr>
            <tr><td class="label">Form of Product</td><td class="value">{{ $record->form_of_product ?? '—' }}</td></tr>
            <tr><td class="label">Color Material</td><td class="value">{{ $record->color_material ?? '—' }}</td></tr>
            <tr><td class="label">Fragrance / Flavour</td><td class="value">{{ $record->fragrance_flavour ?? '—' }}</td></tr>
            <tr><td class="label">pH Value</td><td class="value">{{ $record->ph_value ?? '—' }}</td></tr>
            <tr><td class="label">Mfg. Lic. No</td><td class="value">{{ $record->mfg_lic_no ?? '—' }}</td></tr>
            <tr><td class="label">Packing Trader</td><td class="value">{{ $record->packing_trader ?? '—' }}</td></tr>
            <tr><td class="label">Bottle / Jar</td><td class="value">{{ $record->bottle_jar ?? '—' }}</td></tr>
            <tr><td class="label">Pack Size</td><td class="value">{{ $record->pack_size ?? '—' }}</td></tr>
            <tr><td class="label">Batch Size</td><td class="value">{{ $record->batch_size ?? '—' }}</td></tr>
            <tr><td class="label">No. of Packs</td><td class="value">{{ $record->no_of_packs ?? '—' }}</td></tr>
            <tr><td class="label">Batch Number</td><td class="value">{{ $record->batch_number ?? '—' }}</td></tr>
            <tr><td class="label">Manufacturing Date</td>
                <td class="value">
                    @php
                        $md = $record->manufacturing_date ?? null;
                        echo $md ? \Carbon\Carbon::parse($md)->format('d-M-Y') : '—';
                    @endphp
                </td>
            </tr>
            <tr><td class="label">Shelf Life</td><td class="value">{{ $record->shelf_life ?? '—' }}</td></tr>
            <tr><td class="label">No. of Sample</td><td class="value">{{ $record->no_of_sample ?? '—' }}</td></tr>
            <tr><td class="label">Sampled By</td><td class="value">{{ $record->sampled_by ?? '—' }}</td></tr>
            <tr><td class="label">Sample Handed Over To</td><td class="value">{{ $record->sample_handed_over_to ?? '—' }}</td></tr>
            <tr><td class="label">QC Checked</td><td class="value">{{ $record->qc_checked ?? '—' }}</td></tr>
            <tr><td class="label">Record Manager</td><td class="value">{{ $record->record_manager ?? '—' }}</td></tr>
        </tbody>
    </table>

  
</main>



</body>
</html>
