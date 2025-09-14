// resources/js/utils/analytics.js
// Utility for visitor analytics logging

export function logAction(page, details = '') {
  fetch('/api/log-action', {
    method: 'POST',
    credentials: 'same-origin',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ page, details })
  });
}

export function startVisitorSession() {
  logAction('LandingPage', 'Math verified');
}
