FROM php:8.0.0-apache

# Install SSH server, MySQLi extension, and SSL module for Apache
RUN apt-get update && \
    apt-get install -y openssh-server nfs-common openssl lynx && \
    docker-php-ext-install mysqli && \
    a2enmod ssl

# Add a new user 'remote_user' with password 'password1234' and SSH access
RUN useradd -rm -d /home/remote_user -s /bin/bash -g root remote_user && \
    echo 'remote_user:password1234' | chpasswd && \
    mkdir -p /home/remote_user/.ssh && \
    chmod 700 /home/remote_user/.ssh && \
    ssh-keygen -A && \
    sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin no/' /etc/ssh/sshd_config

# Create privilege separation directory for SSH
RUN mkdir /run/sshd

# Copy the public SSH key for 'remote_user'
COPY id_rsa.pub /home/remote_user/.ssh/authorized_keys

# Set permissions for SSH keys
RUN chown remote_user:root -R /home/remote_user && \
    chmod 600 /home/remote_user/.ssh/authorized_keys

# Expose SSH port
EXPOSE 22

# Start SSH service
CMD ["/usr/sbin/sshd", "-D"]

