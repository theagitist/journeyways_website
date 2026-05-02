/**
 * PM2 process config for the www.journeyways.ca backend.
 *
 * Usage:
 *   cd /var/www/www.journeyways.ca/server
 *   pm2 start ecosystem.config.cjs
 *   pm2 save
 *
 * Logs at /var/www/www.journeyways.ca/server/logs/.
 */
module.exports = {
  apps: [
    {
      name: 'journeyways-www',
      script: './index.js',
      cwd: __dirname,
      instances: 1,
      exec_mode: 'fork',
      autorestart: true,
      max_restarts: 10,
      restart_delay: 2000,
      max_memory_restart: '128M',
      env: {
        NODE_ENV: 'production',
      },
      out_file: './logs/out.log',
      error_file: './logs/err.log',
      merge_logs: true,
      time: true,
    },
  ],
};
