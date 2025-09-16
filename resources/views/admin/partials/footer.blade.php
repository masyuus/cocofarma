<footer class="admin-footer">
    <div class="footer-content">
        <div class="footer-left">
            <div class="copyright">
                <p>&copy; 2025 <strong>Cocofarma</strong>. All rights reserved.</p>
            </div>
            <div class="version">
                <span class="badge bg-secondary">v1.0.0</span>
            </div>
        </div>

        <div class="footer-center">
            <div class="footer-links">
                <a href="#" class="footer-link">Privacy Policy</a>
                <span class="separator">|</span>
                <a href="#" class="footer-link">Terms of Service</a>
                <span class="separator">|</span>
                <a href="#" class="footer-link">Support</a>
                <span class="separator">|</span>
                <a href="#" class="footer-link">Documentation</a>
            </div>
        </div>

        <div class="footer-right">
            <div class="footer-info">
                <span class="text-muted">Powered by</span>
                <strong class="text-primary">Laravel</strong>
                <span class="text-muted">&</span>
                <strong class="text-success">Bootstrap</strong>
            </div>
        </div>
    </div>
</footer>

<style>
.admin-footer {
    background: #f8fafc;
    border-top: 1px solid #e9ecef;
    padding: 1.5rem 0;
    margin-top: auto;
    position: relative;
}

.footer-content {
    max-width: 100%;
    margin: 0 auto;
    padding: 0 1.5rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.footer-left,
.footer-center,
.footer-right {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.copyright {
    font-size: 0.875rem;
    color: #6c757d;
    margin: 0;
}

.copyright strong {
    color: #495057;
}

.version .badge {
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
}

.footer-links {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.footer-link {
    color: #6c757d;
    text-decoration: none;
    font-size: 0.875rem;
    transition: color 0.2s ease;
}

.footer-link:hover {
    color: #495057;
    text-decoration: underline;
}

.separator {
    color: #dee2e6;
    font-size: 0.875rem;
}

.footer-info {
    font-size: 0.875rem;
    color: #6c757d;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.footer-info strong {
    font-weight: 600;
}

/* Responsive */
@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }

    .footer-left,
    .footer-center,
    .footer-right {
        justify-content: center;
    }

    .footer-links {
        justify-content: center;
    }
}

@media (max-width: 576px) {
    .footer-links {
        flex-direction: column;
        gap: 0.25rem;
    }

    .separator {
        display: none;
    }

    .footer-link {
        padding: 0.25rem 0;
    }

    .footer-info {
        flex-direction: column;
        gap: 0.125rem;
    }
}

/* Dark theme support */
@media (prefers-color-scheme: dark) {
    .admin-footer {
        background: #1a202c;
        border-top-color: #2d3748;
    }

    .copyright,
    .footer-link,
    .footer-info {
        color: #a0aec0;
    }

    .copyright strong,
    .footer-link:hover {
        color: #e2e8f0;
    }

    .separator {
        color: #4a5568;
    }
}
</style>