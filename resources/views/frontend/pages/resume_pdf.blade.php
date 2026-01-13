<!doctype html>
<html lang="ms">
<head>
    <meta charset="utf-8">
    <title>Resume</title>
    <style>
        @page { margin: 28px 34px; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #1f2937; }
        .header { border-bottom: 2px solid #0b5ed7; padding-bottom: 10px; margin-bottom: 16px; }
        .name { font-size: 22px; font-weight: 700; margin: 0; }
        .target { font-size: 13px; color: #0b5ed7; margin-top: 4px; }
        .muted { color: #6b7280; }
        .row { width: 100%; }
        .col-left { width: 34%; vertical-align: top; padding-right: 14px; }
        .col-right { width: 66%; vertical-align: top; padding-left: 14px; border-left: 1px solid #e5e7eb; }
        .section { margin-bottom: 14px; }
        .section h3 { font-size: 13px; margin: 0 0 8px; text-transform: uppercase; letter-spacing: .6px; color: #111827; }
        .box { background: #f9fafb; border: 1px solid #e5e7eb; padding: 10px; border-radius: 6px; }
        .item { margin-bottom: 10px; }
        .item:last-child { margin-bottom: 0; }
        .title { font-weight: 700; }
        .small { font-size: 11px; }
        ul { margin: 6px 0 0 16px; padding: 0; }
        li { margin: 0 0 4px; }
        .pill { display: inline-block; border: 1px solid #d1d5db; padding: 3px 8px; border-radius: 999px; margin: 0 6px 6px 0; font-size: 11px; }
        .hr { height: 1px; background: #e5e7eb; margin: 10px 0; }
        .footer { margin-top: 10px; font-size: 10px; color: #9ca3af; text-align: right; }
    </style>
</head>
<body>

    <div class="header">
        <p class="name">{{ $userName }}</p>
        <div class="target">
            {{ $profile['jawatan_sasaran'] ?? 'Jawatan Sasaran' }}
        </div>
        <div class="small muted" style="margin-top:6px;">
            {{ $profile['telefon'] ?? '-' }} &nbsp; • &nbsp;
            {{ $profile['email'] ?? '-' }}
        </div>
        <div class="small muted" style="margin-top:3px;">
            {{ $profile['alamat'] ?? '-' }},
            {{ $profile['poskod'] ?? '' }} {{ $profile['bandar'] ?? '' }},
            {{ $profile['negeri'] ?? '' }}
        </div>
    </div>

    <table class="row" cellspacing="0" cellpadding="0">
        <tr>
            {{-- LEFT --}}
            <td class="col-left">
                <div class="section">
                    <h3>Maklumat</h3>
                    <div class="box small">
                        <div><span class="muted">No. IC:</span> {{ $profile['no_ic'] ?? '-' }}</div>
                        <div style="margin-top:4px;"><span class="muted">Telefon:</span> {{ $profile['telefon'] ?? '-' }}</div>
                        <div style="margin-top:4px;"><span class="muted">Emel:</span> {{ $profile['email'] ?? '-' }}</div>
                    </div>
                </div>

                <div class="section">
                    <h3>Kemahiran</h3>
                    <div class="box">
                        @foreach(($profile['kemahiran'] ?? []) as $skill)
                            <span class="pill">{{ $skill }}</span>
                        @endforeach
                        @if(empty($profile['kemahiran']))
                            <div class="small muted">Tiada kemahiran direkod.</div>
                        @endif
                    </div>
                </div>

                <div class="section">
                    <h3>Bahasa</h3>
                    <div class="box">
                        @foreach(($profile['bahasa'] ?? []) as $b)
                            <span class="pill">{{ $b }}</span>
                        @endforeach
                        @if(empty($profile['bahasa']))
                            <div class="small muted">Tiada bahasa direkod.</div>
                        @endif
                    </div>
                </div>
            </td>

            {{-- RIGHT --}}
            <td class="col-right">
                <div class="section">
                    <h3>Ringkasan Profil</h3>
                    <div class="box">
                        {{ $profile['ringkasan'] ?? '-' }}
                    </div>
                </div>

                <div class="section">
                    <h3>Pendidikan</h3>
                    <div class="box">
                        @forelse(($profile['pendidikan'] ?? []) as $edu)
                            <div class="item">
                                <div class="title">{{ $edu['institusi'] ?? '-' }}</div>
                                <div class="small muted">
                                    {{ $edu['tahap'] ?? '-' }} — {{ $edu['bidang'] ?? '-' }}
                                    @if(!empty($edu['tahun'])) • {{ $edu['tahun'] }} @endif
                                </div>
                            </div>
                        @empty
                            <div class="small muted">Tiada rekod pendidikan.</div>
                        @endforelse
                    </div>
                </div>

                <div class="section">
                    <h3>Pengalaman</h3>
                    <div class="box">
                        @forelse(($profile['pengalaman'] ?? []) as $exp)
                            <div class="item">
                                <div class="title">{{ $exp['jawatan'] ?? '-' }}</div>
                                <div class="small muted">
                                    {{ $exp['organisasi'] ?? '-' }}
                                    @if(!empty($exp['tahun'])) • {{ $exp['tahun'] }} @endif
                                </div>
                                @if(!empty($exp['huraian']))
                                    <div style="margin-top:4px;">{{ $exp['huraian'] }}</div>
                                @endif
                            </div>
                        @empty
                            <div class="small muted">Tiada pengalaman direkod.</div>
                        @endforelse
                    </div>
                </div>

                <div class="section">
                    <h3>Projek / Aktiviti</h3>
                    <div class="box">
                        @forelse(($profile['projek'] ?? []) as $p)
                            <div class="item">
                                <div class="title">{{ $p['tajuk'] ?? '-' }}</div>
                                @if(!empty($p['huraian']))
                                    <div class="small muted" style="margin-top:3px;">{{ $p['huraian'] }}</div>
                                @endif
                            </div>
                        @empty
                            <div class="small muted">Tiada projek direkod.</div>
                        @endforelse
                    </div>
                </div>

            </td>
        </tr>
    </table>

</body>
</html>
