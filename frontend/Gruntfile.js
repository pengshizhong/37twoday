module.exports = function(grunt) {

    var pngminArr = {
        sourceImgPath: 'src/img/', //源文件路径
        destImgPath: 'dist/img/', //压缩后文件路径
        fileType: ['**/*.png'] //压缩文件类型， !表示不压缩
    }

    // 配置任务参数
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        /* png压缩优化 */
        pngmin: {
            compile: {
                options: {
                    ext: '.png',
                    force: true // 按原来的文件名输出，默认为false
                        //iebug : true
                },
                files: [{
                    expand: true,
                    cwd: pngminArr.sourceImgPath,
                    src: pngminArr.fileType,
                    dest: pngminArr.destImgPath
                }]
            }
        },
        /* 文件连接 */
        concat: {
            css: {
                options: {
                    banner: '/*!\n * <%= pkg.name %> - CSS for Debug\n * @licence <%= pkg.name %> - v<%= pkg.version %> (<%= grunt.template.today("yyyy-mm-dd") %>)\n * zhouguilin@gm99.com | Licence: MIT\n */\n'
                },
                src: [
                    'src/css/**/*.css'
                ],
                dest: 'dist/css/main.all.css'
            },
            js: {
                options: {
                    banner: '/*!\n * <%= pkg.name %> - JS for Debug\n * @licence <%= pkg.name %> - v<%= pkg.version %> (<%= grunt.template.today("yyyy-mm-dd") %>)\n * zhouguilin@gm99.com | Licence: MIT\n */\n'
                },
                src: [
                    'src/js/lib/**/*.js',
                    'src/js/common/**/*.js',
                    'src/js/class/**/*.js'
                ],
                dest: 'dist/js/main.all.js'
            }
        },
        /* js压缩 */
        uglify: {
            options: {
                banner: '/*!\n * <%= pkg.name %> - compressed JS\n * @licence <%= pkg.name %> - v<%= pkg.version %> (<%= grunt.template.today("yyyy-mm-dd") %>)\n * zhouguilin@gm99.com | Licence: MIT\n */\n'
            },
            main: {
                files: {
                    'dist/js/main.min.js': ['dist/js/main.all.js']
                }
            }
        }
    });

    // 插件加载
    grunt.loadNpmTasks('grunt-pngmin');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // 自定义任务：通过定义 default 任务，可以让Grunt默认执行一个或多个任务。
    grunt.registerTask('default', ['pngmin', 'concat', 'uglify']);

};
