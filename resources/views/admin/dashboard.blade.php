@extends('template.admin.template')
@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Diagnosis Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->

              <div class="card-body">
                <h5 class="card-title">Data Diagnosis</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-diagram-3"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $dataDiagnosis }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Diagnosis Card -->

          <!-- Symptom Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->

              <div class="card-body">
                <h5 class="card-title">Data Gejala</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-file-medical"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $dataGejala }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Symptom Card -->

          <!-- Knowledge Base Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->

              <div class="card-body">
                <h5 class="card-title">Data Basis Pengetahuan</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-book"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $dataBasisPengetahuan }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Knowledge Base Card -->

          <!-- History Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->

              <div class="card-body">
                <h5 class="card-title">Data Riwayat</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-clipboard"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $dataRiwayat }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End History Card -->

          <!-- Patient Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->

              <div class="card-body">
                <h5 class="card-title">Data Pasien</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $dataPasien }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Patient Card -->

          <!-- Article Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->

              <div class="card-body">
                <h5 class="card-title">Data Artikel</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-file-text"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $dataArtikel }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Article Card -->



          <!-- Reports -->
          <div class="col-12">
            <div class="card">

              <!-- <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div> -->

              <div class="card-body">
                <h5 class="card-title"> Hasil Diagnosis <span>| Today</span></h5>

                <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                <script>
                  document.addEventListener("DOMContentLoaded", () => {
                    const visualisasiDiagnosis = JSON.parse('{!! json_encode($visualisasiDiagnosis) !!}');

                    echarts.init(document.querySelector("#trafficChart")).setOption({
                      tooltip: {
                        trigger: 'item'
                      },
                      legend: {
                        top: '5%',
                        left: 'center'
                      },
                      series: [{
                        name: 'Diagnosis',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        avoidLabelOverlap: false,
                        label: {
                          show: true,
                          position: 'inside',
                          formatter: '{b}: {c}'
                        },
                        emphasis: {
                          label: {
                            show: true,
                            fontSize: '18',
                            fontWeight: 'bold'
                          }
                        },
                        labelLine: {
                          show: false
                        },
                        data: [{
                            value: visualisasiDiagnosis.Rendah,
                            name: 'Rendah',
                            itemStyle: {
                              color: '#0D9276' 
                            }
                          },
                          {
                            value: visualisasiDiagnosis.Sedang,
                            name: 'Sedang',
                            itemStyle: {
                              color: '#FDE767'
                            }
                          },
                          {
                            value: visualisasiDiagnosis.Tinggi,
                            name: 'Tinggi',
                            itemStyle: {
                              color: '#D04848' 
                            }
                          }
                        ]
                      }]
                    });
                  });
                </script>
                <!-- End Line Chart -->

              </div>

            </div>
          </div><!-- End Reports -->
        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Recent Activity -->
        <div class="card">
          <!-- <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div> -->

          <div class="card-body" data-count="{{ $activityLogs->count() }}">
            <h5 class="card-title">Aktivitas Terbaru <span>| Today</span></h5>

            <div class="activity" id="recentActivity">
              @php
              // Urutkan aktivitas berdasarkan waktu secara descending
              $sortedActivityLogs = $activityLogs->sortByDesc('created_at');
              $count = 0;
              @endphp

              @foreach ($sortedActivityLogs as $log)
              @if ($count < 5) <div class="activity-item d-flex">
                <div class="activite-label">{{ $log->created_at->diffForHumans() }}</div>
                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                <div class="activity-content">
                  <strong>{{ ucwords($log->user->name) }}</strong> melakukan {{ $log->activity }}
                </div>
            </div><!-- End activity item-->
            @endif
            @php $count++; @endphp
            @endforeach
          </div>
        </div>
      </div><!-- End Recent Activity -->

      <!-- News & Updates Traffic -->
      <div class="card">
        <!-- <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div> -->

        <div class="card-body pb-0">
          <h5 class="card-title">Artikel &amp; Terbaru <span>| Today</span></h5>

          <div class="news">
            <div class="post-item clearfix">
              @php
              // Urutkan artikel berdasarkan waktu secara descending
              $sortedDataArtikel = $article->sortByDesc('created_at');
              $counts = 0;
              @endphp

              @foreach ($sortedDataArtikel as $artikel)
              <!-- <img src="data:image; base64, {{ base64_encode($fileContent)}}" style="height: auto; width: 80px" alt="gambar artikel"> -->
              <td class="align-middle text-center"><img src="{{ asset('uploads/'. $artikel->filepath) }}" width="auto" height="80px"></td>
              <h4><a href="{{ route('data-artikel.show', $artikel->slug) }}">{{ $artikel->judul}} </a></h4>
              <p>
              <div style="font-size: 14px; color: #777777; margin-left: 95px;">{!! substr($artikel->isi, 0, 100) !!}{{ strlen($artikel->isi) > 100 ? "..." : "" }}</div>
              </p>
            </div>
            @php $counts++; @endphp
            @endforeach
          </div><!-- End sidebar recent posts-->

        </div>
      </div><!-- End News & Updates -->

    </div><!-- End Right side columns -->

    </div>
  </section>

</main><!-- End #main -->
@endsection