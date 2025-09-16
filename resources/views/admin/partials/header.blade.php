<header class="admin-header">
    <div class="header-content">
        <div class="breadcrumb-section">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#" class="text-decoration-none">
                            <i class="bx bx-home-alt"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $pageTitle ?? 'Dashboard' }}
                    </li>
                </ol>
            </nav>
            <h1 class="page-title">{{ $pageTitle ?? 'Dashboard' }}</h1>
        </div>

        <div class="header-actions">
            <div class="search-box">
                <input type="text" class="form-control" placeholder="Search..." id="headerSearch">
                <i class="bx bx-search search-icon"></i>
            </div>

            <div class="notifications">
                <button class="btn btn-link position-relative" id="notificationBtn">
                    <i class="bx bx-bell"></i>
                    <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">3</span>
                </button>
            </div>

            <div class="user-menu">
                <div class="dropdown">
                    <button class="btn btn-link dropdown-toggle d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar">
                            <span>AD</span>
                        </div>
                        <div class="user-info d-none d-md-block">
                            <div class="user-name">Admin</div>
                            <div class="user-role">Administrator</div>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#"><i class="bx bx-user"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bx bx-cog"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="bx bx-log-out"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
.admin-header {
    background: #fff;
    border-bottom: 1px solid #e9ecef;
    padding: 1rem 0;
    position: sticky;
    top: 0;
    z-index: 100;
    box-shadow: 0 2px 4px rgba(0,0,0,0.04);
}

.header-content {
    max-width: 100%;
    margin: 0 auto;
    padding: 0 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.breadcrumb-section {
    flex: 1;
}

.breadcrumb {
    background: transparent;
    margin-bottom: 0.5rem;
    padding: 0;
}

.breadcrumb-item {
    display: flex;
    align-items: center;
    font-size: 0.875rem;
}

.breadcrumb-item a {
    color: #6c757d;
    text-decoration: none;
}

.breadcrumb-item a:hover {
    color: #495057;
}

.breadcrumb-item.active {
    color: #495057;
    font-weight: 500;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: "/";
    color: #6c757d;
    padding: 0 0.5rem;
}

.page-title {
    font-size: 1.75rem;
    font-weight: 600;
    color: #2d3748;
    margin: 0;
}

.header-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.search-box {
    position: relative;
    width: 250px;
}

.search-box .form-control {
    padding-right: 2.5rem;
    border-radius: 8px;
    border: 1px solid #e2e8f0;
    background: #f8fafc;
}

.search-box .form-control:focus {
    background: #fff;
    border-color: #4299e1;
    box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.1);
}

.search-icon {
    position: absolute;
    right: 0.75rem;
    top: 50%;
    transform: translateY(-50%);
    color: #a0aec0;
    font-size: 1.1rem;
}

.notifications .btn {
    color: #718096;
    padding: 0.5rem;
    border-radius: 8px;
    position: relative;
}

.notifications .btn:hover {
    background: #f7fafc;
    color: #4a5568;
}

.notifications .badge {
    font-size: 0.7rem;
    padding: 0.25rem 0.5rem;
    min-width: 18px;
    height: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.user-menu .btn {
    color: #718096;
    padding: 0.5rem;
    border-radius: 8px;
}

.user-menu .btn:hover {
    background: #f7fafc;
    color: #4a5568;
}

.user-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 0.875rem;
    margin-right: 0.75rem;
}

.user-info {
    text-align: left;
}

.user-name {
    font-size: 0.875rem;
    font-weight: 600;
    color: #2d3748;
    line-height: 1.2;
}

.user-role {
    font-size: 0.75rem;
    color: #718096;
    line-height: 1.2;
}

.dropdown-menu {
    border: none;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    border-radius: 8px;
    padding: 0.5rem 0;
    margin-top: 0.5rem;
}

.dropdown-item {
    padding: 0.75rem 1.5rem;
    font-size: 0.875rem;
    color: #4a5568;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.dropdown-item:hover {
    background: #f7fafc;
    color: #2d3748;
}

.dropdown-item.text-danger:hover {
    background: #fed7d7;
    color: #e53e3e;
}

.dropdown-divider {
    margin: 0.5rem 0;
    border-color: #e2e8f0;
}

/* Responsive */
@media (max-width: 768px) {
    .header-content {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }

    .breadcrumb-section {
        text-align: center;
    }

    .header-actions {
        justify-content: center;
        flex-wrap: wrap;
    }

    .search-box {
        width: 100%;
        max-width: 300px;
    }

    .user-info {
        display: none;
    }
}

@media (max-width: 576px) {
    .page-title {
        font-size: 1.5rem;
    }

    .search-box {
        display: none;
    }

    .header-actions {
        gap: 0.5rem;
    }
}
</style>