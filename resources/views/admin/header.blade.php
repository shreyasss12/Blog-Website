  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Search -->
      <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                  aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                  <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                  </button>
              </div>
          </div>
      </form>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-search fa-fw"></i>
              </a>
          </li>

          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                  {{-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> --}}
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                  </a>
                  <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content">

                              <!-- Header -->
                              <div class="modal-header">
                                  <h5 class="modal-title" id="profileModalLabel">Update Profile</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <form action="{{ route('profile.update') }}" method="POST"
                                      enctype="multipart/form-data">
                                      @csrf
                                      <div class="row mb-3">
                                          <div class="col-md-4 text-center">
                                              <img src="{{ asset('storage/' . Auth::user()->profile_image ?? 'img/undraw_profile.svg') }}"
                                                  class="rounded-circle img-fluid mb-2" width="120" height="120"
                                                  alt="Profile Image">
                                              <input type="file" name="profile_image" class="form-control">
                                          </div>
                                          <div class="col-md-8">
                                              <div class="form-group mb-3">
                                                  <label for="name">Name</label>
                                                  <input type="text" name="name"
                                                      value="{{ Auth::user()->name }}" class="form-control" required>
                                              </div>

                                              <div class="form-group mb-3">
                                                  <label for="email">Email</label>
                                                  <input type="email" name="email"
                                                      value="{{ Auth::user()->email }}" class="form-control" required>
                                              </div>

                                              <div class="form-group mb-3">
                                                  <label for="password">Password (leave blank to keep current)</label>
                                                  <input type="password" name="password" class="form-control">
                                              </div>
                                          </div>
                                      </div>

                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary"
                                              data-bs-dismiss="modal">Cancel</button>
                                          <button type="submit" class="btn btn-primary">Save Changes</button>
                                      </div>
                                  </form>
                              </div>

                          </div>
                      </div>
                  </div>
                  <div class="dropdown-divider"></div>
                  <form action="{{ route('logout') }}" method="POST">
                      @csrf
                      <button type="submit" class="dropdown-item">
                          Logout
                      </button>
                  </form>
              </div>
          </li>

      </ul>

  </nav>
