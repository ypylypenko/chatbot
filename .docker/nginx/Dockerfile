FROM nginx:latest

RUN mkdir -p /app
COPY app.conf /etc/nginx/nginx.conf

CMD ["nginx", "-g", "daemon off;"]
