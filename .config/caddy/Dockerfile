FROM caddy:2.4.6-alpine

RUN rm -rf /etc/caddy/
ADD https://dl.k8s.io/release/v1.23.4/bin/linux/amd64/kubectl /usr/local/bin/kubectl
RUN chmod +x /usr/local/bin/kubectl
COPY . /etc/caddy/
RUN echo "* * * * * /etc/caddy/crontab.sh" > /etc/crontabs/root; echo "* * * * * sleep 30; /etc/caddy/crontab.sh" >> /etc/crontabs/root; 
CMD ["sh","-c","crond && caddy run --config /etc/caddy/Caddyfile --adapter caddyfile"]
